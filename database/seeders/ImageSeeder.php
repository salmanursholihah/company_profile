<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Mengunduh semua gambar dari https://ptutamacta.com/ ke project lokal.
 *
 * Lokasi hasil unduhan:
 *  - 'storage' => storage/app/public/<path>   (akses via /storage/<path>, butuh `php artisan storage:link`)
 *  - 'public'  => public/<path>               (akses via /<path>)
 *
 * Cara pakai:
 *   php artisan storage:link
 *   php artisan db:seed --class=ImageSeeder
 *
 * File yang sudah ada tidak diunduh ulang (ubah $overwrite = true untuk menimpa).
 */
class ImageSeeder extends Seeder
{
    private string $baseUrl = 'https://ptutamacta.com';

    private bool $overwrite = false;

    /**
     * [disk, path relatif, url sumber]
     * Path relatif di sini sama dengan path yang disimpan di CompanyProfileSeeder.
     */
    private function images(): array
    {
        return [
            // ---- Tentang perusahaan ----
            ['storage', 'uploads/about/HUYqMHPuOFvAdGutp2PEFei6yV9zvKnjy3lJ7hoI.jpg', '/storage/uploads/about/HUYqMHPuOFvAdGutp2PEFei6yV9zvKnjy3lJ7hoI.jpg'],

            // ---- Produk / katalog ----
            ['storage', 'katalog/7dEnebw03sBToBMSmVV9DaFddBDjmURymD9bxOyc.png', '/storage/katalog/7dEnebw03sBToBMSmVV9DaFddBDjmURymD9bxOyc.png'], // IPAL 3,5 m3
            ['storage', 'katalog/cvc4S15io3NHveEMfGGZyM6HoUvQKdXZDjjQoz3Z.png', '/storage/katalog/cvc4S15io3NHveEMfGGZyM6HoUvQKdXZDjjQoz3Z.png'], // IPAL 30 m3
            ['storage', 'katalog/znTP78jnOsq2XvDK85WCL1NnkJ3W4NkYcKPkGtSj.png', '/storage/katalog/znTP78jnOsq2XvDK85WCL1NnkJ3W4NkYcKPkGtSj.png'], // IPAL 60 m3
            ['storage', 'katalog/51ZKqj6jQSTglg9e2Uo0d0ds96gPU08mBmYWBlN3.png', '/storage/katalog/51ZKqj6jQSTglg9e2Uo0d0ds96gPU08mBmYWBlN3.png'], // IPAL 80 m3

            // ---- Legalitas & sertifikasi (di website path-nya /uploads/..., bukan /storage/...) ----
            ['public', 'uploads/legalitas/1771401860-vkan.png',     '/uploads/legalitas/1771401860-vkan.png'],
            ['public', 'uploads/legalitas/1771401918-iso-9001.jpeg', '/uploads/legalitas/1771401918-iso-9001.jpeg'],
            ['public', 'uploads/legalitas/1771401945-iapmo.png',    '/uploads/legalitas/1771401945-iapmo.png'],
            ['public', 'uploads/legalitas/1771401977-bsn.jpeg',     '/uploads/legalitas/1771401977-bsn.jpeg'],

            // ---- Logo mitra ----
            ['storage', 'images/cgdfnst0QImeoW2n5EicUWsmxuUIJC6vICz1Td1g.jpg', '/storage/images/cgdfnst0QImeoW2n5EicUWsmxuUIJC6vICz1Td1g.jpg'],
            ['storage', 'images/IjJLvpHEYJVyYDrlZZN3Jb86AYzGeuHOhU68caTg.jpg', '/storage/images/IjJLvpHEYJVyYDrlZZN3Jb86AYzGeuHOhU68caTg.jpg'],
            ['storage', 'images/Y9IWuhYjTUIHdkMzHvKTvuEDtslWBPTvRpOhIjQZ.jpg', '/storage/images/Y9IWuhYjTUIHdkMzHvKTvuEDtslWBPTvRpOhIjQZ.jpg'],
        ];
    }

    public function run(): void
    {
        $ok = $skipped = 0;
        $failed = [];

        foreach ($this->images() as [$disk, $path, $url]) {
            $exists = $disk === 'public'
                ? File::exists(public_path($path))
                : Storage::disk('public')->exists($path);

            if ($exists && !$this->overwrite) {
                $skipped++;
                continue;
            }

            try {
                $response = Http::timeout(60)
                    ->retry(2, 500)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; ImageSeeder)'])
                    ->get($this->baseUrl . $url);

                if (!$response->successful() || $response->body() === '') {
                    $failed[] = $url . ' (HTTP ' . $response->status() . ')';
                    continue;
                }

                if ($disk === 'public') {
                    $target = public_path($path);
                    File::ensureDirectoryExists(dirname($target));
                    File::put($target, $response->body());
                } else {
                    Storage::disk('public')->put($path, $response->body());
                }

                $ok++;
                $this->command?->info("OK   {$path}");
            } catch (\Throwable $e) {
                $failed[] = $url . ' (' . $e->getMessage() . ')';
            }
        }

        $this->command?->info("Selesai: {$ok} diunduh, {$skipped} dilewati (sudah ada), " . count($failed) . ' gagal.');

        foreach ($failed as $f) {
            $this->command?->warn("GAGAL {$f}");
        }
    }
}
