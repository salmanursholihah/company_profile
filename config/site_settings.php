<?php

/*
|--------------------------------------------------------------------------
| Definisi Pengaturan Situs (dikelola dari Admin > Setting)
|--------------------------------------------------------------------------
| SUMBER TUNGGAL untuk: form admin, nilai default, validasi, dan API mobile.
| Ingin menambah pengaturan baru? Cukup tambah satu entri di 'fields' —
| form admin & endpoint /api/v1/settings otomatis ikut.
|
| type: text | textarea | color | image | bool | list
| list: daftar baris berulang, kolomnya didefinisikan di 'columns'.
*/

return [

    'groups' => [
        'brand'    => ['label' => 'Brand & Logo',     'hint' => 'Nama, logo, dan favicon. Dipakai di web dan aplikasi mobile.'],
        'colors'   => ['label' => 'Warna',            'hint' => 'Satu palet untuk web dan mobile. Perubahan langsung terlihat di aplikasi saat dibuka ulang.'],
        'home'     => ['label' => 'Konten Beranda',   'hint' => 'Teks tombol, ajakan (CTA), keunggulan, dan cara kerja.'],
        'sections' => ['label' => 'Tampilkan Bagian', 'hint' => 'Hidupkan/matikan bagian tertentu di beranda mobile.'],
        'contact'  => ['label' => 'Kontak & WhatsApp', 'hint' => 'Nomor WhatsApp diatur di menu Footer; di sini pesan pembukanya.'],
    ],

    'fields' => [

        /* ===================== BRAND ===================== */
        'brand_name' => [
            'group' => 'brand', 'type' => 'text', 'label' => 'Nama brand',
            'help' => 'Tampil di header web, sidebar admin, dan nama aplikasi mobile.',
            'default' => 'Ositech', 'max' => 60,
        ],
        'site_title' => [
            'group' => 'brand', 'type' => 'text', 'label' => 'Judul situs (tab browser)',
            'default' => 'Company Profile PT Utama Cipta Tata Asri - Ositech', 'max' => 120,
        ],
        'brand_tagline' => [
            'group' => 'brand', 'type' => 'text', 'label' => 'Slogan singkat',
            'help' => 'Dipakai bila slide hero belum punya headline.',
            'default' => 'Solusi IPAL untuk air yang lebih bersih', 'max' => 120,
        ],
        'logo' => [
            'group' => 'brand', 'type' => 'image', 'label' => 'Logo',
            'help' => 'PNG/SVG/JPG/WEBP, maks 2 MB. Disarankan latar transparan. Kosong = tampil nama brand sebagai teks.',
            'default' => null, 'max_kb' => 2048,
        ],
        'favicon' => [
            'group' => 'brand', 'type' => 'image', 'label' => 'Favicon',
            'help' => 'Ikon kecil di tab browser. Kotak (mis. 128x128), maks 1 MB.',
            'default' => null, 'max_kb' => 1024,
        ],

        /* ===================== WARNA ===================== */
        'color_primary'        => ['group' => 'colors', 'type' => 'color', 'label' => 'Utama (brand)',            'help' => 'Tombol aktif, ikon, tautan.',            'default' => '#12808f'],
        'color_primary_dark'   => ['group' => 'colors', 'type' => 'color', 'label' => 'Utama gelap',              'help' => 'Judul, footer, teks di atas kuning.',     'default' => '#0b4a56'],
        'color_on_primary'     => ['group' => 'colors', 'type' => 'color', 'label' => 'Teks di atas warna utama', 'help' => 'Biasanya putih.',                        'default' => '#ffffff'],
        'color_accent'         => ['group' => 'colors', 'type' => 'color', 'label' => 'Aksen (CTA)',              'help' => 'Tombol ajakan, indikator.',               'default' => '#f2b134'],
        'color_on_accent'      => ['group' => 'colors', 'type' => 'color', 'label' => 'Teks di atas aksen',       'help' => 'Teks pada tombol aksen.',                 'default' => '#0b4a56'],
        'color_background'     => ['group' => 'colors', 'type' => 'color', 'label' => 'Latar halaman',            'default' => '#f5fafb'],
        'color_surface'        => ['group' => 'colors', 'type' => 'color', 'label' => 'Latar kartu',              'default' => '#ffffff'],
        'color_aqua'           => ['group' => 'colors', 'type' => 'color', 'label' => 'Aqua muda',                'help' => 'Latar ikon & indikator navigasi.',        'default' => '#e0f1f3'],
        'color_aqua_deep'      => ['group' => 'colors', 'type' => 'color', 'label' => 'Aqua tua',                 'help' => 'Ujung gradien gambar.',                   'default' => '#9ccfd6'],
        'color_stroke'         => ['group' => 'colors', 'type' => 'color', 'label' => 'Garis / border',           'default' => '#d6e6e9'],
        'color_text_primary'   => ['group' => 'colors', 'type' => 'color', 'label' => 'Teks utama',               'default' => '#0b2f39'],
        'color_text_secondary' => ['group' => 'colors', 'type' => 'color', 'label' => 'Teks sekunder',            'default' => '#6b8a91'],
        'color_error'          => ['group' => 'colors', 'type' => 'color', 'label' => 'Error',                    'default' => '#e0453a'],
        'color_success'        => ['group' => 'colors', 'type' => 'color', 'label' => 'Sukses',                   'default' => '#2e9e6b'],

        /* ===================== KONTEN BERANDA ===================== */
        'hero_eyebrow' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Teks kecil di atas hero (mobile)',
            'default' => 'Selamat datang di', 'max' => 60,
        ],
        'hero_primary_label' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Tombol hero utama',
            'help' => 'Web: menuju Produk. Mobile: menuju Katalog.',
            'default' => 'Lihat Produk', 'max' => 40,
        ],
        'hero_secondary_label' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Tombol hero kedua',
            'help' => 'Menuju halaman Kontak.',
            'default' => 'Hubungi Kami', 'max' => 40,
        ],
        'keunggulan_title' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Judul daftar keunggulan',
            'default' => 'Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan diantaranya :', 'max' => 200,
        ],
        'keunggulan' => [
            'group' => 'home', 'type' => 'list', 'label' => 'Daftar keunggulan',
            'help' => 'Tampil di bagian Tentang pada web dan mobile.',
            'columns' => ['text' => ['label' => 'Keunggulan', 'type' => 'text', 'max' => 160]],
            'max_rows' => 10,
            'default' => [
                ['text' => 'Instalasi cepat & handal'],
                ['text' => 'Pelatihan operator & pendampingan'],
                ['text' => 'Produk ramah lingkungan & hemat energi'],
            ],
        ],
        'cta_title' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Judul kartu ajakan (CTA)',
            'default' => 'Butuh IPAL untuk bangunan Anda?', 'max' => 100,
        ],
        'cta_subtitle' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Subjudul CTA',
            'default' => 'Konsultasi gratis dengan tim kami', 'max' => 120,
        ],
        'cta_button' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Tombol CTA',
            'default' => 'Konsultasi', 'max' => 30,
        ],
        'cara_kerja_title' => [
            'group' => 'home', 'type' => 'text', 'label' => 'Judul "Cara kerja"',
            'default' => 'Cara kerja IPAL', 'max' => 60,
        ],
        'cara_kerja' => [
            'group' => 'home', 'type' => 'list', 'label' => 'Langkah cara kerja IPAL',
            'help' => 'Urutan proses pengolahan. Tampil di beranda mobile.',
            'columns' => [
                'title'       => ['label' => 'Judul',     'type' => 'text',     'max' => 40],
                'description' => ['label' => 'Penjelasan', 'type' => 'textarea', 'max' => 240],
            ],
            'max_rows' => 10,
            'default' => [
                ['title' => 'Inlet',        'description' => 'Air limbah masuk lewat saringan kasar yang menahan sampah dan lemak.'],
                ['title' => 'Ekualisasi',   'description' => 'Debit dan beban dirata-ratakan supaya proses berikutnya stabil.'],
                ['title' => 'Aerasi',       'description' => 'Blower memberi oksigen agar bakteri menguraikan zat organik.'],
                ['title' => 'Sedimentasi',  'description' => 'Lumpur mengendap, air bening naik ke bagian atas.'],
                ['title' => 'Outlet',       'description' => 'Air hasil olahan dibuang sesuai baku mutu.'],
            ],
        ],
        'stats' => [
            'group' => 'home', 'type' => 'list', 'label' => 'Angka statistik (mobile, tab Tentang)',
            'help' => 'Contoh: 10+ | Tahun pengalaman. Kosongkan semua baris untuk menyembunyikan bagian ini.',
            'columns' => [
                'value' => ['label' => 'Angka', 'type' => 'text', 'max' => 12],
                'label' => ['label' => 'Label', 'type' => 'text', 'max' => 30],
            ],
            'max_rows' => 4,
            'default' => [],
        ],

        /* ===================== TAMPILKAN BAGIAN (MOBILE) ===================== */
        'show_about'      => ['group' => 'sections', 'type' => 'bool', 'label' => 'Tentang singkat + keunggulan', 'default' => true],
        'show_cara_kerja' => ['group' => 'sections', 'type' => 'bool', 'label' => 'Cara kerja IPAL',             'default' => true],
        'show_visi_misi'  => ['group' => 'sections', 'type' => 'bool', 'label' => 'Visi & Misi',                 'default' => true],
        'show_services'   => ['group' => 'sections', 'type' => 'bool', 'label' => 'Layanan Kami',                'default' => true],
        'show_catalogs'   => ['group' => 'sections', 'type' => 'bool', 'label' => 'Produk / Katalog unggulan',   'default' => true],
        'show_legalitas'  => ['group' => 'sections', 'type' => 'bool', 'label' => 'Legalitas & Sertifikasi',     'default' => true],
        'show_partners'   => ['group' => 'sections', 'type' => 'bool', 'label' => 'Logo mitra',                  'default' => true],
        'show_blog'       => ['group' => 'sections', 'type' => 'bool', 'label' => 'Artikel terbaru',             'default' => true],
        'show_whatsapp'   => ['group' => 'sections', 'type' => 'bool', 'label' => 'Tombol WhatsApp mengambang',  'default' => true],

        /* ===================== KONTAK ===================== */
        'wa_message' => [
            'group' => 'contact', 'type' => 'textarea', 'label' => 'Pesan pembuka WhatsApp',
            'help' => 'Gunakan {company} untuk nama perusahaan (dari menu Footer).',
            'default' => 'Halo {company}, saya ingin bertanya tentang produk.', 'max' => 250,
        ],
    ],
];
