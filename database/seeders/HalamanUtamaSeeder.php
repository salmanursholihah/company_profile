<?php

namespace Database\Seeders;

/** Hero Beranda (tabel halaman_utamas). Kolom image wajib terisi, jadi diisi kosong. */
class HalamanUtamaSeeder extends OnceSeeder
{
    public function run(): void
    {
        $this->once('halaman_utamas', ['headline' => 'Solusi IPAL untuk air yang lebih bersih'], [
            'sub_headline' => 'Kami merancang, membangun, dan merawat instalasi pengolahan air limbah untuk rumah sakit, hotel, pabrik, dan permukiman.',
            'url' => null,
            'image' => '',
        ]);
    }
}
