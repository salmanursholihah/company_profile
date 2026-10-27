<?php

namespace App\Models;

use App\Support\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

/**
 * Pengaturan situs (logo, warna, teks, dsb) yang diatur dari Admin > Setting.
 * Definisi & nilai default ada di config/site_settings.php.
 *
 * Pemakaian:
 *   SiteSetting::get('brand_name');
 *   SiteSetting::values();          // semua key => nilai (sudah digabung default)
 *   SiteSetting::imageUrl('logo');
 */
class SiteSetting extends Model
{
    public const CACHE_KEY = 'site_settings.v1';

    protected $fillable = ['key', 'value'];

    /** memo per-request agar tidak query berulang */
    private static ?array $memo = null;

    /* -------------------- baca -------------------- */

    public static function definitions(): array
    {
        return config('site_settings.fields', []);
    }

    /** Semua pengaturan: nilai dari DB, jatuh ke default bila belum diisi. */
    public static function values(): array
    {
        if (self::$memo !== null) {
            return self::$memo;
        }

        $stored = [];
        try {
            $stored = Cache::get(self::CACHE_KEY);
            if ($stored === null) {
                // Hasil kosong karena tabel belum ada TIDAK boleh di-cache selamanya
                // (dulu bikin pengaturan tidak terbaca walau migrate sudah dijalankan).
                if (Schema::hasTable('site_settings')) {
                    $stored = static::query()->pluck('value', 'key')->all();
                    Cache::forever(self::CACHE_KEY, $stored);
                } else {
                    $stored = [];
                }
            }
        } catch (\Throwable $e) {
            // DB/cache belum siap (mis. sebelum migrate) -> pakai default saja
            $stored = [];
        }

        $out = [];
        foreach (self::definitions() as $key => $def) {
            $out[$key] = array_key_exists($key, $stored)
                ? self::decode($def, $stored[$key])
                : ($def['default'] ?? null);
        }

        return self::$memo = $out;
    }

    public static function get(string $key, $default = null)
    {
        $all = self::values();
        $v = $all[$key] ?? null;

        return ($v === null || $v === '') ? $default : $v;
    }

    /** URL absolut untuk pengaturan bertipe image (null bila kosong). */
    public static function imageUrl(string $key): ?string
    {
        $path = self::get($key);

        return $path ? Media::url($path) : null;
    }

    /* -------------------- tulis -------------------- */

    public static function put(string $key, $value): void
    {
        $def = self::definitions()[$key] ?? null;
        if (!$def) {
            return;
        }

        static::updateOrCreate(['key' => $key], ['value' => self::encode($def, $value)]);
    }

    /** Hapus nilai tersimpan (kembali ke default) untuk satu grup. */
    public static function resetGroup(string $group): void
    {
        $keys = collect(self::definitions())->filter(fn ($d) => $d['group'] === $group)->keys();
        static::whereIn('key', $keys)->delete();
        self::flush();
    }

    public static function flush(): void
    {
        self::$memo = null;
        Cache::forget(self::CACHE_KEY);
    }

    /* -------------------- konversi -------------------- */

    private static function encode(array $def, $value): ?string
    {
        return match ($def['type']) {
            'bool' => $value ? '1' : '0',
            'list' => json_encode(array_values((array) $value), JSON_UNESCAPED_UNICODE),
            default => $value === null ? null : (string) $value,
        };
    }

    private static function decode(array $def, $raw)
    {
        return match ($def['type']) {
            'bool' => $raw === null ? ($def['default'] ?? false) : in_array($raw, ['1', 1, true, 'true'], true),
            'list' => is_array($d = json_decode((string) $raw, true)) ? $d : ($def['default'] ?? []),
            // gambar boleh kosong (= tanpa logo); teks/warna yang dikosongkan kembali ke bawaan
            'image' => $raw,
            default => ($raw === null || $raw === '') ? ($def['default'] ?? null) : $raw,
        };
    }

    /* -------------------- helper tampilan -------------------- */

    /** "#12808f" -> "18, 128, 143" (untuk --bs-primary-rgb) */
    public static function rgb(string $hex): string
    {
        $h = ltrim($hex, '#');
        if (strlen($h) !== 6) {
            return '0, 0, 0';
        }

        return implode(', ', [hexdec(substr($h, 0, 2)), hexdec(substr($h, 2, 2)), hexdec(substr($h, 4, 2))]);
    }

    /** Link WhatsApp lengkap dengan pesan pembuka; null bila nomor belum diisi di Footer. */
    public static function whatsappLink(): ?string
    {
        $footer = Footer::first();
        $raw = $footer?->social_links['whatsapp'] ?? null;
        if (!$raw) {
            return null;
        }

        if (str_starts_with($raw, 'http')) {
            return $raw;
        }

        $msg = str_replace('{company}', $footer->company_name ?: self::get('brand_name', ''), (string) self::get('wa_message', ''));

        // Nomor lokal 08xx -> format internasional 628xx (wajib untuk wa.me)
        $number = preg_replace('/\D/', '', $raw);
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        return 'https://wa.me/' . $number . ($msg !== '' ? '?text=' . rawurlencode($msg) : '');
    }

    /* -------------------- payload API mobile -------------------- */

    public static function apiPayload(): array
    {
        $s = self::values();

        $colors = [];
        foreach ($s as $key => $val) {
            if (str_starts_with($key, 'color_')) {
                $colors[substr($key, 6)] = $val;
            }
        }

        $sections = [];
        foreach ($s as $key => $val) {
            if (str_starts_with($key, 'show_')) {
                $sections[substr($key, 5)] = (bool) $val;
            }
        }

        $clean = fn (array $rows) => array_values(array_filter($rows, fn ($r) => collect($r)->filter(fn ($v) => trim((string) $v) !== '')->isNotEmpty()));

        $payload = [
            'brand' => [
                'name'        => $s['brand_name'],
                'site_title'  => $s['site_title'],
                'tagline'     => $s['brand_tagline'],
                'logo_url'    => self::imageUrl('logo'),
                'favicon_url' => self::imageUrl('favicon'),
            ],
            'colors' => $colors,
            'home' => [
                'hero_eyebrow'         => $s['hero_eyebrow'],
                'hero_primary_label'   => $s['hero_primary_label'],
                'hero_secondary_label' => $s['hero_secondary_label'],
                'keunggulan_title'     => $s['keunggulan_title'],
                'keunggulan'           => array_values(array_map(fn ($r) => $r['text'] ?? '', $clean($s['keunggulan']))),
                'cta_title'            => $s['cta_title'],
                'cta_subtitle'         => $s['cta_subtitle'],
                'cta_button'           => $s['cta_button'],
                'cara_kerja_title'     => $s['cara_kerja_title'],
                'cara_kerja'           => $clean($s['cara_kerja']),
            ],
            'stats'    => $clean($s['stats']),
            'sections' => $sections,
            'contact'  => [
                'whatsapp_url' => self::whatsappLink(),
                'wa_message'   => $s['wa_message'],
            ],
        ];

        // "version" berubah setiap ada pengaturan yang diubah -> Flutter tahu kapan perlu memperbarui cache
        $payload['version'] = substr(md5(json_encode($payload)), 0, 12);

        return $payload;
    }
}
