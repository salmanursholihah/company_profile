<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin (aman dijalankan berulang, tidak error kalau email sudah ada)
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'admin',
                'password' => bcrypt('admin123'), // ganti setelah login pertama
            ]
        );

        $this->call([
            // Sudah mencakup: about, hero, visi-misi, layanan, katalog,
            // legalitas, logo mitra, footer + unduh semua gambar.
            // Menggantikan seeder lama `abouts` dan `FooterSeed`.
            CompanyProfileSeeder::class,

            BlogSeeder::class,
        ]);
    }
}
