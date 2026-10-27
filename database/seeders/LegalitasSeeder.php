<?php

namespace Database\Seeders;

class LegalitasSeeder extends OnceSeeder
{
    public function run(): void
    {
        $items = [
            ['Akta pendirian dan NIB', 'Badan usaha berbadan hukum dengan nomor induk berusaha yang sah.'],
            ['SIUJK konstruksi', 'Izin usaha jasa konstruksi untuk pekerjaan instalasi pengolahan air limbah.'],
            ['Sertifikat ISO 9001', 'Sistem manajemen mutu untuk desain dan fabrikasi unit IPAL.'],
        ];
        foreach ($items as $i => [$judul, $deskripsi]) {
            $this->once('legalitas', ['judul' => $judul], [
                'deskripsi' => $deskripsi,
                'image' => null,
                'urutan' => $i + 1,
            ]);
        }
    }
}
