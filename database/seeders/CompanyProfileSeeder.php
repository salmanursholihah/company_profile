<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Footer;
use App\Models\HalamanUtama;
use App\Models\Image;
use App\Models\Katalog;
use App\Models\Legalitas;
use App\Models\Service;
use App\Models\VisiMisi;
use Illuminate\Database\Seeder;

/**
 * Konten lengkap PT Utama Cipta Tata Asri (sumber: https://ptutamacta.com/)
 * disesuaikan dengan migration & model project company_profile.
 *
 * Tabel yang diisi:
 *   abouts, halaman_utamas, visi_misis, services, katalogs,
 *   legalitas, images (footer_logo), footers
 *
 * Aman dijalankan berulang (updateOrCreate), tidak membuat data dobel.
 *
 * Jalankan:
 *   php artisan storage:link
 *   php artisan db:seed --class=CompanyProfileSeeder
 */
class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Unduh semua gambar dulu (butuh internet) -> lihat ImageSeeder.php
        $this->call(ImageSeeder::class);

        // 2) Isi database
        $this->about();
        $this->halamanUtama();
        $this->visiMisi();
        $this->services();
        $this->katalogs();
        $this->legalitas();
        $this->footerLogos();
        $this->footer();
    }

    // ------------------------------------------------------------------
    // abouts  (view: asset($about->image)  => simpan 'storage/uploads/about/..')
    // ------------------------------------------------------------------
    private function about(): void
    {
        About::updateOrCreate(
            ['headline' => 'Selayang Pandang Perusahaan'],
            [
                'sub_headline' => 'Produsen IPAL yang inovatif, efisien, dan ramah lingkungan',
                'image'        => 'storage/uploads/about/HUYqMHPuOFvAdGutp2PEFei6yV9zvKnjy3lJ7hoI.jpg',
                'url'          => null,
                'description'  => "PT Utama Cipta Tata Asri merupakan perusahaan manufaktur yang bergerak di bidang rekayasa lingkungan dengan fokus utama pada pengolahan air limbah (Wastewater Treatment) dan sistem IPAL (Instalasi Pengolahan Air Limbah). Sebagai produsen IPAL terpercaya, kami menghadirkan rangkaian solusi pengolahan limbah yang inovatif, efisien, dan ramah lingkungan, mencakup produksi, instalasi, konstruksi, operasional, hingga maintenance.\n\n"
                    . "Kami menyediakan solusi komprehensif untuk berbagai sektor, antara lain:\n"
                    . "Limbah medis (rumah sakit, klinik, laboratorium kesehatan, dan fasilitas kesehatan lainnya),\n"
                    . "Limbah industri (makanan dan minuman, tekstil, kimia, farmasi, peternakan, dan manufaktur).\n\n"
                    . "Setiap unit IPAL yang kami produksi dikembangkan sesuai standar baku mutu lingkungan berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan (PerMen LHK), serta mengacu pada standar internasional seperti WHO dan EPA, guna memastikan hasil olahan limbah aman, stabil, dan tidak mencemari lingkungan.\n\n"
                    . "Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan, di antaranya:\n"
                    . "- Instalasi cepat & handal\n"
                    . "- Pelatihan operator & pendampingan\n"
                    . "- Produk ramah lingkungan & hemat energi",
            ]
        );
    }

    // ------------------------------------------------------------------
    // halaman_utamas = hero carousel
    // view: background-image: asset($item->image)
    // Gambar memakai file yang SUDAH ada di project (public/assets/img/hero-bg.*).
    // Ganti dengan gambar slider produksi kalau ada.
    // ------------------------------------------------------------------
    private function halamanUtama(): void
    {
        $slides = [
            [
                'headline'     => 'PT Utama Cipta Tata Asri',
                'sub_headline' => 'Kami adalah perusahaan manufaktur yang bergerak dalam bidang rekayasa lingkungan pengelolaan limbah, khususnya limbah cair. Kami merupakan produsen IPAL (instalasi pengolahan air limbah) yang inovatif, efisien, dan ramah lingkungan. Menghadirkan solusi yang komprehensif untuk pengelolaan limbah medis, limbah domestik, serta limbah industri yang memenuhi standar regulasi lingkungan nasional, sesuai dengan PerMen LHK.',
                'image'        => 'assets/img/hero-bg.jpg',
            ],
            [
                'headline'     => 'Instalasi & Maintenance IPAL',
                'sub_headline' => 'Menyediakan layanan lengkap mulai dari pengadaan, konstruksi, instalasi alat, uji kualitas air, hingga perawatan berkala. Setiap sistem dirancang sesuai kebutuhan dan kapabilitas pelanggan yang mengacu kepada standar PerMen LHK di Indonesia, sehingga menghasilkan limbah yang aman, biaya yang efisien, dan fasilitas mudah dioperasikan.',
                'image'        => 'assets/img/hero-bg.jpeg',
            ],
            [
                'headline'     => 'Reliable, Ecolable, and Reasonable',
                'sub_headline' => 'Dengan motto Reliable, Ecolable, and Reasonable, kami menghadirkan solusi pengolahan limbah cair yang bekerja secara otomatis tanpa pendampingan operator yang harus stand by, ramah lingkungan, dan hemat biaya. Produk-produk kami dirancang untuk beroperasi sepanjang waktu, mengurangi dampak pencemaran, serta membantu perusahaan mencapai efisiensi energi dan operasional secara lebih mudah dan berkelanjutan.',
                'image'        => 'assets/img/hero-bg.png',
            ],
        ];

        foreach ($slides as $s) {
            HalamanUtama::updateOrCreate(
                ['headline' => $s['headline']],
                $s + ['url' => '/product']
            );
        }
    }

    // ------------------------------------------------------------------
    // visi_misis  (type: visi | misi)
    // Misi yang dobel di website sudah dibersihkan (9 poin unik).
    // ------------------------------------------------------------------
    private function visiMisi(): void
    {
        VisiMisi::updateOrCreate(
            ['type' => 'visi'],
            ['icon' => null, 'text' => 'Menjadi perusahaan penyedia layanan pengelolaan air limbah yang inovatif, tepercaya, dan berkelanjutan dengan kualitas terbaik.']
        );

        $misi = [
            'Melakukan pemeliharaan preventif dan korektif terhadap peralatan IPAL untuk menjaga kelancaran operasional.',
            'Mengembangkan dan memproduksi unit instalasi pengolahan air limbah (IPAL) yang efektif dan berkualitas.',
            'Menerapkan teknologi pengolahan limbah cair yang efisien dan ramah lingkungan.',
            'Mendukung pengendalian pencemaran air melalui pengolahan limbah yang sesuai baku mutu lingkungan.',
            'Memberikan layanan instalasi, pengujian (commissioning), dan pelatihan operasional IPAL.',
            'Menyediakan layanan perawatan dan perbaikan (maintenance) untuk menjamin keandalan sistem IPAL.',
            'Mengoptimalkan pengelolaan lumpur hasil olahan (sludge) agar aman dan sesuai standar teknis.',
            'Mendorong pemanfaatan kembali air hasil olahan (reuse) untuk mendukung efisiensi sumber daya air.',
            'Mengurangi dampak pencemaran lingkungan melalui penerapan sistem manajemen lingkungan yang berkelanjutan.',
        ];

        foreach ($misi as $text) {
            VisiMisi::updateOrCreate(
                ['type' => 'misi', 'text' => $text],
                ['icon' => null]
            );
        }
    }

    // ------------------------------------------------------------------
    // services (link diarahkan ke route lokal yang sudah ada di routes/web.php,
    // jadi tombol "Baca Selengkapnya" tidak lagi kosong / ke domain lain)
    // ------------------------------------------------------------------
    private function services(): void
    {
        $data = [
            ['Operator Training', 'Cara operasional harian. Pemahaman parameter teknis. Cara menangani masalah umum di IPAL.', '/operator_training'],
            ['Penyediaan Bahan dan Sparepart', 'Chemical IPAL (deodorizer, kaporit, PAC, nutrisi bakteri). Media biofilter (MBBR, bio ball, honeycomb).', '/penyediaan_bahan'],
            ['Upgrade dan Retrofit IPAL Lama', 'Pembesaran kapasitas. Penggantian sistem lama ke teknologi baru. Efisiensi energi (blower ke turbo blower, dll.).', '/renovasi_ipal'],
            ['Monitoring dan Pengujian Sampel di Laboratorium', 'Sampling & uji laboratorium berkala. Analisa kualitas air buangan sesuai baku mutu.', '/monitoring_pengujian'],
            ['Perawatan dan Maintenance', 'Penggantian pompa/BLDC blower. Pembersihan biofilter & media. Sludge management.', '/Perawatan_dan_Maintenance'],
            ['Commissioning', 'Uji fungsi seluruh peralatan. Kalibrasi pompa & blower. Inokulasi bakteri / proses seeding.', '/Commissioning'],
            ['Instalasi Pemasangan', 'Pengiriman unit IPAL ke lokasi. Instalasi pipa inlet-outlet. Pemasangan blower.', '/instalasi_pemasangan'],
            ['Pabrikasi Unit IPAL', 'Pembuatan rangka IPAL. Pembuatan tank fiberglass / mild steel / HDPE. Pembuatan reaktor.', '/fabrikasi_unit'],
            ['Desain & Konsultasi Teknis', 'Survey lokasi dan analisis kebutuhan kapasitas IPAL. Perhitungan beban limbah (influen).', '/desain_konsultasi'],
        ];

        foreach ($data as [$title, $desc, $link]) {
            Service::updateOrCreate(
                ['title' => $title],
                ['description' => $desc, 'image' => null, 'link' => $link]
            );
        }
    }

    // ------------------------------------------------------------------
    // katalogs
    // view: asset('storage/' . $product->image)  => simpan 'katalog/xxx.png'
    // spesifikasi = teks, ditampilkan nl2br => satu baris satu spesifikasi
    // ------------------------------------------------------------------
    private function katalogs(): void
    {
        $company = 'PT Utama Cipta Tata Asri';

        $items = [
            [
                'name'         => 'IPAL OSITECH 3,5M³',
                'kode_produk'  => 'WT-PRO-004i-3.5',
                'seri_produk'  => 'Compact Series',
                'kategori'     => 'IPAL Klinik / Lab / UMKM OSITECH',
                'image'        => 'katalog/7dEnebw03sBToBMSmVV9DaFddBDjmURymD9bxOyc.png',
                'preview_desc' => 'IPAL kapasitas kecil untuk klinik, laboratorium, usaha F&B, dan fasilitas kesehatan kecil.',
                'deskripsi'    => 'IPAL OSITECH 3,5M³ dirancang untuk fasilitas dengan debit limbah rendah namun membutuhkan kualitas pengolahan maksimal. Sistem menggunakan teknologi oksidasi ozon yang mampu meniru proses alami pemurnian air tanpa bahan kimia berbahaya. Unit ini sangat cocok untuk klinik, laboratorium, dan usaha kecil yang membutuhkan sistem IPAL ringkas, hemat energi, dan mudah dalam perawatan.',
                'spesifikasi'  => "Kapasitas : 3,5 m³ / hari\nTeknologi : Ozon Oxidation + Biological Treatment\nMaterial Tank : FRP / Carbon Steel Coating\nSistem Operasi : Automatic\nKonsumsi Listrik : Rendah\nChemical : Non Chemical System\nStandar Output : Baku Mutu PerMen LHK",
            ],
            [
                'name'         => 'IPAL OSITECH 30M³',
                'kode_produk'  => 'WT-PRO-004i-30',
                'seri_produk'  => 'Standard Industrial Series',
                'kategori'     => 'IPAL Rumah Sakit Kecil / Industri Ringan OSITECH',
                'image'        => 'katalog/cvc4S15io3NHveEMfGGZyM6HoUvQKdXZDjjQoz3Z.png',
                'preview_desc' => 'IPAL kapasitas menengah untuk rumah sakit kecil dan industri produksi ringan.',
                'deskripsi'    => 'Dirancang untuk kebutuhan industri dan fasilitas kesehatan skala menengah. Sistem IPAL ini mengutamakan kestabilan proses, efisiensi energi, serta kemudahan operasional. Teknologi ozon memastikan pengolahan limbah lebih efektif tanpa penggunaan bahan kimia tambahan.',
                'spesifikasi'  => "Kapasitas : 30 m³ / hari\nTeknologi : Ozon + Bio Filter System\nOperasional : 24 Jam Non Stop\nMonitoring : Control Panel Digital\nMaintenance : Mudah",
            ],
            [
                'name'         => 'IPAL OSITECH 60M³',
                'kode_produk'  => 'WT-PRO-004i-60',
                'seri_produk'  => 'Industrial Series',
                'kategori'     => 'IPAL Industri Menengah OSITECH',
                'image'        => 'katalog/znTP78jnOsq2XvDK85WCL1NnkJ3W4NkYcKPkGtSj.png',
                'preview_desc' => 'IPAL untuk rumah sakit besar, industri makanan, tekstil, dan manufaktur menengah.',
                'deskripsi'    => 'Unit ini mampu menangani beban limbah tinggi dengan stabilitas proses yang optimal. Sistem multi stage treatment memastikan kualitas air hasil olahan memenuhi standar lingkungan nasional dan internasional.',
                'spesifikasi'  => "Kapasitas : 60 m³ / hari\nSistem : Multi Stage Treatment\nMaterial : Industrial Grade Steel / FRP\nAutomation : Full Automatic\nStandar : WHO Reference + PerMen LHK",
            ],
            [
                'name'         => 'IPAL OSITECH 80M³',
                'kode_produk'  => 'WT-PRO-004i-80',
                'seri_produk'  => 'Heavy Duty Series',
                'kategori'     => 'IPAL Industri Besar OSITECH',
                'image'        => 'katalog/51ZKqj6jQSTglg9e2Uo0d0ds96gPU08mBmYWBlN3.png',
                'preview_desc' => 'IPAL untuk industri skala besar dan fasilitas produksi padat.',
                'deskripsi'    => 'IPAL Heavy Duty dirancang untuk operasi industri non stop dengan tingkat stabilitas tinggi. Sangat cocok untuk kawasan industri dan rumah sakit besar.',
                'spesifikasi'  => "Kapasitas : 80 m³ / hari\nSistem : Continuous Flow Treatment\nPower Efficiency : High Efficiency Motor\nMonitoring : SCADA Ready",
            ],
        ];

        foreach ($items as $item) {
            Katalog::updateOrCreate(
                ['kode_produk' => $item['kode_produk']],
                $item + [
                    'company'      => $company,
                    'brand'        => 'OSITECH',
                    'model_produk' => 'WT PRO 004i',
                ]
            );
        }
    }

    // ------------------------------------------------------------------
    // legalitas
    // view: asset('uploads/legalitas/' . $item->image) => simpan NAMA FILE saja
    // ------------------------------------------------------------------
    private function legalitas(): void
    {
        $data = [
            ['VKAN',     '1771401860-vkan.png'],
            ['ISO 9001', '1771401918-iso-9001.jpeg'],
            ['IAPMO',    '1771401945-iapmo.png'],
            ['BSN',      '1771401977-bsn.jpeg'],
        ];

        foreach ($data as $i => [$judul, $file]) {
            Legalitas::updateOrCreate(
                ['judul' => $judul],
                ['deskripsi' => null, 'image' => $file, 'urutan' => $i + 1]
            );
        }
    }

    // ------------------------------------------------------------------
    // images (type footer_logo) = logo mitra
    // view: asset('storage/' . $logo->image_path) => simpan 'images/xxx.jpg'
    // ------------------------------------------------------------------
    private function footerLogos(): void
    {
        $files = [
            'images/cgdfnst0QImeoW2n5EicUWsmxuUIJC6vICz1Td1g.jpg',
            'images/IjJLvpHEYJVyYDrlZZN3Jb86AYzGeuHOhU68caTg.jpg',
            'images/Y9IWuhYjTUIHdkMzHvKTvuEDtslWBPTvRpOhIjQZ.jpg',
        ];

        foreach ($files as $i => $path) {
            Image::updateOrCreate(
                ['image_path' => $path],
                [
                    'title'      => 'Logo mitra ' . ($i + 1),
                    'type'       => 'footer_logo',
                    'is_active'  => true,
                    'sort_order' => $i + 1,
                ]
            );
        }
    }

    // ------------------------------------------------------------------
    // footers (JSON dicast array oleh model Footer)
    // useful_links = [{name,url}], our_services = [string],
    // social_links = [platform => url] (whatsapp boleh hanya nomor)
    // ------------------------------------------------------------------
    private function footer(): void
    {
        $footer = Footer::first() ?? new Footer();

        $footer->fill([
            'company_name' => 'PT Utama Cipta Tata Asri',
            'address'      => 'Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02, Magelang, Kec. Magelang Utara, Kota Magelang, Jawa Tengah',
            'phone'        => '085820027279',
            'email'        => 'ptutamacta@gmail.com', // ambil dari FooterSeed lama, sesuaikan
            'useful_links' => [
                ['name' => 'Product', 'url' => '/product'],
                ['name' => 'About',   'url' => '/about'],
                ['name' => 'Terms',   'url' => '/terms'],
            ],
            // Isi template "Web Design / Web Development / ..." diganti layanan asli
            'our_services' => [
                'Operator Training',
                'Penyediaan Bahan dan Sparepart',
                'Upgrade dan Retrofit IPAL Lama',
                'Monitoring dan Pengujian Sampel',
                'Perawatan dan Maintenance',
                'Commissioning',
                'Instalasi Pemasangan',
                'Pabrikasi Unit IPAL',
                'Desain & Konsultasi Teknis',
            ],
            'social_links' => [
                'tiktok'    => 'https://www.tiktok.com/@ospod67',
                'youtube'   => 'https://youtube.com/@ospod-milos',
                'whatsapp'  => '6285820027279',
                'instagram' => 'https://www.instagram.com/pt_utama_ciptatataasri',
            ],
            'tagline'      => 'Reliable, Ecolable, and Reasonable',
            'copyright'    => '© Copyright UCTA by ositech. All Rights Reserved',
        ])->save();
    }
}
