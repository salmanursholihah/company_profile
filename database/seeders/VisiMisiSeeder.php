<?php

namespace Database\Seeders;

class VisiMisiSeeder extends OnceSeeder
{
    public function run(): void
    {
        $this->once('visi_misis', [
            'type' => 'visi',
            'text' => 'Menjadi mitra utama pengelolaan air limbah yang andal di Indonesia.',
        ], ['icon' => null]);

        $misi = [
            'Menyediakan unit IPAL berkualitas dengan harga yang kompetitif.',
            'Memberikan layanan instalasi dan perawatan yang cepat dan transparan.',
            'Menjaga lingkungan lewat pengolahan air limbah sesuai baku mutu.',
            'Mengembangkan tim yang kompeten dan bersertifikat.',
        ];
        foreach ($misi as $text) {
            $this->once('visi_misis', ['type' => 'misi', 'text' => $text], ['icon' => null]);
        }
    }
}
