<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;
class FooterSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Footer::create([
        'company_name' => 'PT Utama Cipta Tata Asri',
        'address' => 'Jl. Ahmad Yani Perum PJKA No.4...',
        'phone' => '0831-1666-8809',
        'email' => 'ptutamacta@gmail.com',

        'useful_links' => [
            'Home' => '/',
            'About us' => '/about',
            'Product' => '/product',
            'Terms of Service' => '/terms'
        ],

        'our_services' => [
            'Web Design',
            'Web Development',
            'Product Management',
            'Marketing'
        ],

        'social_links' => [
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'tiktok' => 'https://tiktok.com',
            'youtube' => 'https://youtube.com',
            'linkedin' => 'https://linkedin.com',
        ],

        'tagline' => 'Reliable, Ecodable, and Reasonable',
        'copyright' => '© Copyright UCTA by ositech. All Rights Reserved',
    ]);
}

}
