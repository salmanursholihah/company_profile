<?php

namespace Database\Seeders;

use App\Models\Guide;
use App\Models\GuideCategory;
use Illuminate\Database\Seeder;

class GuideDemoSeeder extends Seeder
{
    public function run(): void
    {
        $ipal = GuideCategory::updateOrCreate(['slug' => 'panduan-ipal'], ['name' => 'Panduan IPAL', 'sort_order' => 1, 'is_active' => true]);
        $app  = GuideCategory::updateOrCreate(['slug' => 'aplikasi'], ['name' => 'Aplikasi', 'sort_order' => 2, 'is_active' => true]);

        $g1 = Guide::updateOrCreate(['slug' => 'dasar-ipal'], [
            'category_id' => $ipal->id,
            'title'       => 'Dasar-dasar IPAL',
            'summary'     => 'Mengenal cara kerja dan komponen utama Instalasi Pengolahan Air Limbah.',
            'description' => 'Panduan bertahap untuk memahami IPAL dari nol.',
            'level'       => 'pemula',
            'is_published' => true,
            'sort_order'  => 1,
        ]);

        if ($g1->lessons()->count() === 0) {
            $g1->lessons()->createMany([
                ['title' => 'Apa itu IPAL?', 'type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                 'description' => 'Pengantar singkat (contoh).', 'duration_minutes' => 8, 'is_free' => true, 'sort_order' => 1],
                ['title' => 'Komponen utama IPAL', 'type' => 'article',
                 'content' => '<h3>Komponen utama</h3><p>Bak ekualisasi, bak aerasi, dan clarifier.</p>',
                 'is_free' => true, 'sort_order' => 2],
                ['title' => 'Perawatan berkala', 'type' => 'article',
                 'content' => '<p>Jadwal perawatan rutin IPAL (materi premium contoh).</p>',
                 'is_free' => false, 'sort_order' => 3],
                ['title' => 'Troubleshooting lanjutan', 'type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                 'duration_minutes' => 15, 'is_free' => false, 'sort_order' => 4],
            ]);
        }

        Guide::updateOrCreate(['slug' => 'panduan-aplikasi'], [
            'category_id' => $app->id,
            'title'       => 'Panduan Menggunakan Aplikasi',
            'summary'     => 'Cara memakai aplikasi untuk memesan layanan dan memantau perawatan.',
            'level'       => 'pemula',
            'is_published' => true,
            'sort_order'  => 2,
        ]);
    }
}
