<?php

namespace Database\Seeders;

class PortfolioSeeder extends OnceSeeder
{
    public function run(): void
    {
        $items = [
            ['IPAL Hotel Bintang 4', 'Hotel', 'Instalasi IPAL biofilter kapasitas 30 m³/hari dengan akses perawatan mudah.'],
            ['IPAL Rumah Sakit Daerah', 'Rumah Sakit', 'Sistem pengolahan limbah medis cair dengan disinfeksi akhir.'],
            ['IPAL Pabrik Makanan', 'Industri', 'Unit ekualisasi dan koagulasi untuk beban organik tinggi.'],
            ['IPAL Perumahan Cluster', 'Perumahan', 'IPAL komunal untuk 120 unit rumah.'],
        ];
        foreach ($items as [$name, $category, $description]) {
            $this->once('portfolios', ['name' => $name], [
                'category' => $category,
                'image' => null,
                'description' => $description,
            ]);
        }
    }
}
