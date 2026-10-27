<?php

namespace Database\Seeders;

/** Katalog produk (tabel katalogs). Gambar kosong; unggah lewat panel admin. */
class KatalogSeeder extends OnceSeeder
{
    public function run(): void
    {
        // [name, kode, model, seri, kategori, deskripsi, preview, spesifikasi]
        $items = [
            ['Biofilter Fiber BF-5', 'IPAL-BF05', 'BF-5', 'BF', 'Biofilter',
                'Unit kompak berbahan fiberglass dengan media biofilter sarang tawon. Cocok untuk lahan terbatas.',
                'Kapasitas 5 m³/hari untuk rumah tangga, kos, dan ruko.',
                '<ul><li>Material: Fiberglass</li><li>Kapasitas: 5 m³/hari</li><li>Proses: Anaerob–aerob</li></ul>'],
            ['Biofilter Fiber BF-10', 'IPAL-BF10', 'BF-10', 'BF', 'Biofilter',
                'Kapasitas menengah dengan blower hemat daya dan akses perawatan dari atas.',
                'Kapasitas 10 m³/hari untuk hotel kecil, sekolah, dan klinik.',
                '<ul><li>Material: Fiberglass</li><li>Kapasitas: 10 m³/hari</li><li>Proses: Anaerob–aerob</li></ul>'],
            ['IPAL Domestik DM-20', 'IPAL-DM20', 'DM-20', 'DM', 'Domestik',
                'Mengolah air limbah domestik sesuai baku mutu dengan pemantauan sederhana.',
                'Kapasitas 20 m³/hari untuk perumahan dan apartemen.',
                '<ul><li>Material: Beton pracetak</li><li>Kapasitas: 20 m³/hari</li><li>Proses: Lumpur aktif</li></ul>'],
            ['IPAL Industri IN-50', 'IPAL-IN50', 'IN-50', 'IN', 'Industri',
                'Dilengkapi unit ekualisasi dan koagulasi untuk beban organik tinggi.',
                'Kapasitas 50 m³/hari untuk pabrik makanan dan laundry.',
                '<ul><li>Material: Baja berlapis epoksi</li><li>Kapasitas: 50 m³/hari</li><li>Proses: Kimia–biologi</li></ul>'],
            ['IPAL Rumah Sakit RS-30', 'IPAL-RS30', 'RS-30', 'RS', 'Industri',
                'Dengan unit disinfeksi akhir untuk limbah medis cair.',
                'Kapasitas 30 m³/hari untuk rumah sakit dan laboratorium.',
                '<ul><li>Material: Beton + fiber</li><li>Kapasitas: 30 m³/hari</li><li>Proses: Biologi + klorinasi</li></ul>'],
            ['Septic Tank Biotech ST-3', 'IPAL-ST03', 'ST-3', 'ST', 'Domestik',
                'Septic tank modern kedap bocor dengan filter biologis.',
                'Kapasitas 3 m³/hari untuk rumah tinggal.',
                '<ul><li>Material: Fiberglass</li><li>Kapasitas: 3 m³/hari</li><li>Proses: Anaerob</li></ul>'],
        ];

        foreach ($items as [$name, $kode, $model, $seri, $kategori, $deskripsi, $preview, $spek]) {
            $this->once('katalogs', ['kode_produk' => $kode], [
                'name' => $name,
                'brand' => 'IPAL Nusantara',
                'model_produk' => $model,
                'seri_produk' => $seri,
                'image' => '',
                'deskripsi' => $deskripsi,
                'preview_desc' => $preview,
                'company' => 'IPAL Nusantara',
                'kategori' => $kategori,
                'spesifikasi' => $spek,
            ]);
        }
    }
}
