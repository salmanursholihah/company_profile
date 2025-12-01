<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class abouts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'headline' => 'Selayang Pandang Perusahaan',
                'sub_headline' => 'Solusi terpercaya pengolahan limbah cair yang ramah lingkungan',
                'image' => 'uploads/about/default-team.jpg', // contoh path
                'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // contoh
                'description' => 'PT Utama Cipta Tata Asri merupakan perusahaan yang bergerak di bidang rekayasa lingkungan, khususnya pengolahan air limbah. Kami menyediakan solusi yang inovatif, efisien, dan ramah lingkungan untuk berbagai sektor seperti medis, industri, dan permukiman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
