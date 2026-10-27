<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

/**
 * Mengisi tabel `catalogs` beserta gambar produknya.
 *
 * Gambar di database/seeders/catalog_images/ disalin ke storage/app/public/catalogs/
 * dan yang disimpan di database hanya path-nya (mis. "catalogs/biofilter-bf-10.jpg").
 *
 * Prasyarat:  php artisan storage:link
 * Jalankan :  php artisan db:seed --class=CatalogSeeder
 */
class CatalogSeeder extends Seeder
{
    /** Nama tabel & kolom gambar; ubah bila di proyek Anda berbeda. */
    private string $table = 'catalogs';
    private array $imageColumnCandidates = ['image', 'image_path', 'gambar', 'foto', 'thumbnail'];

    public function run(): void
    {
        $columns = Schema::getColumnListing($this->table);
        $imageColumn = collect($this->imageColumnCandidates)
            ->first(fn ($c) => in_array($c, $columns, true));

        $this->say('info', "Kolom tabel {$this->table}: " . implode(', ', $columns));

        if (! $imageColumn) {
            $this->say('error', 'Tidak ada kolom gambar di tabel ' . $this->table
                . ' (dicari: ' . implode(', ', $this->imageColumnCandidates) . '). '
                . 'Gambar TIDAK akan tersimpan. Tambahkan nama kolom gambar Anda ke $imageColumnCandidates.');
        }

        if (! file_exists(public_path('storage'))) {
            $this->say('warn', 'public/storage belum ada -> gambar akan 404. Jalankan: php artisan storage:link');
        }

        $disk = Storage::disk('public');
        $disk->makeDirectory('catalogs');

        foreach ($this->items() as $item) {
            $file = $item['file'];
            unset($item['file']);

            $source = database_path("seeders/catalog_images/{$file}");
            if (File::exists($source)) {
                $disk->put("catalogs/{$file}", File::get($source));
                if ($imageColumn) {
                    $item[$imageColumn] = "catalogs/{$file}";
                }
                $this->say('line', "{$item['name']} -> " . $disk->url("catalogs/{$file}"));
            } else {
                $this->say('warn', "File gambar tidak ditemukan: {$source}");
            }

            // Hanya isi kolom yang benar-benar ada di tabel Anda.
            $row = collect($item)
                ->filter(fn ($v, $col) => in_array($col, $columns, true))
                ->all();

            if (in_array('created_at', $columns, true)) {
                $row['created_at'] = $row['updated_at'] = now();
            }

            DB::table($this->table)->updateOrInsert(['name' => $item['name']], $row);
        }

        $this->say('info', 'Selesai. Buka URL di atas lewat browser; bila tidak tampil, masalahnya ada di storage/URL, bukan di aplikasi.');
    }

    private function say(string $type, string $message): void
    {
        if ($this->command) {
            $this->command->{$type}($message);
        }
    }

    private function items(): array
    {
        return [
            [
                'file' => 'biofilter-bf-10.jpg',
                'name' => 'Biofilter Fiber BF-10',
                'company' => 'IPAL Nusantara',
                'kategori' => 'Biofilter',
                'brand' => 'IPAL Nusantara',
                'preview_desc' => 'Biofilter fiber kapasitas 10 m³/hari untuk perumahan dan perkantoran.',
                'kode_produk' => 'BF-10',
                'model_produk' => 'Biofilter Fiber',
                'seri_produk' => 'BF',
                'deskripsi' => 'Unit pengolahan air limbah domestik berbasis biofilter anaerob-aerob dengan tangki fiberglass anti karat.',
                'spesifikasi' => '<ul><li>Kapasitas: 10 m³/hari</li><li>Material: Fiberglass</li><li>Sistem: Anaerob-aerob</li></ul>',
            ],
            [
                'file' => 'biofilter-bf-5.jpg',
                'name' => 'Biofilter Fiber BF-5',
                'company' => 'IPAL Nusantara',
                'kategori' => 'Biofilter',
                'brand' => 'IPAL Nusantara',
                'preview_desc' => 'Biofilter fiber ringkas kapasitas 5 m³/hari.',
                'kode_produk' => 'BF-5',
                'model_produk' => 'Biofilter Fiber',
                'seri_produk' => 'BF',
                'deskripsi' => 'Biofilter ringkas untuk rumah tinggal dan usaha kecil.',
                'spesifikasi' => '<ul><li>Kapasitas: 5 m³/hari</li><li>Material: Fiberglass</li></ul>',
            ],
            [
                'file' => 'ipal-domestik-dm-20.jpg',
                'name' => 'IPAL Domestik DM-20',
                'company' => 'IPAL Nusantara',
                'kategori' => 'Domestik',
                'brand' => 'IPAL Nusantara',
                'preview_desc' => 'IPAL domestik kapasitas 20 m³/hari untuk apartemen dan kos-kosan.',
                'kode_produk' => 'DM-20',
                'model_produk' => 'IPAL Domestik',
                'seri_produk' => 'DM',
                'deskripsi' => 'Pengolahan air limbah domestik dengan sistem lumpur aktif.',
                'spesifikasi' => '<ul><li>Kapasitas: 20 m³/hari</li><li>Sistem: Lumpur aktif</li></ul>',
            ],
            [
                'file' => 'ipal-industri-in-50.jpg',
                'name' => 'IPAL Industri IN-50',
                'company' => 'IPAL Nusantara',
                'kategori' => 'Industri',
                'brand' => 'IPAL Nusantara',
                'preview_desc' => 'IPAL industri kapasitas 50 m³/hari untuk pabrik skala menengah.',
                'kode_produk' => 'IN-50',
                'model_produk' => 'IPAL Industri',
                'seri_produk' => 'IN',
                'deskripsi' => 'Sistem pengolahan limbah industri dengan unit ekualisasi dan koagulasi.',
                'spesifikasi' => '<ul><li>Kapasitas: 50 m³/hari</li><li>Material: Beton/Baja</li></ul>',
            ],
            [
                'file' => 'ipal-rumah-sakit-rs-30.jpg',
                'name' => 'IPAL Rumah Sakit RS-30',
                'company' => 'IPAL Nusantara',
                'kategori' => 'Domestik',
                'brand' => 'IPAL Nusantara',
                'preview_desc' => 'IPAL fasilitas kesehatan kapasitas 30 m³/hari dengan desinfeksi.',
                'kode_produk' => 'RS-30',
                'model_produk' => 'IPAL Rumah Sakit',
                'seri_produk' => 'RS',
                'deskripsi' => 'Pengolahan limbah fasilitas kesehatan dengan tahap desinfeksi klorin.',
                'spesifikasi' => '<ul><li>Kapasitas: 30 m³/hari</li><li>Desinfeksi: Klorin</li></ul>',
            ],
        ];
    }
}
