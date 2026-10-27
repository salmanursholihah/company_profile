<?php

namespace Database\Seeders;

class ServiceSeeder extends OnceSeeder
{
    public function run(): void
    {
        $items = [
            ['Desain', 'Perancangan IPAL sesuai debit, jenis limbah, dan lahan yang tersedia, lengkap dengan gambar kerja.'],
            ['Instalasi', 'Pemasangan unit IPAL oleh tim kami, dari survei lokasi sampai serah terima dan pelatihan operator.'],
            ['Perawatan', 'Servis berkala blower, pompa, dan media biofilter supaya kinerja tetap terjaga.'],
            ['Uji air', 'Pengambilan sampel dan uji kualitas air olahan di laboratorium terakreditasi.'],
        ];
        foreach ($items as [$title, $description]) {
            $this->once('services', ['title' => $title], [
                'description' => $description,
                'image' => null,
                'link' => null,
            ]);
        }
    }
}
