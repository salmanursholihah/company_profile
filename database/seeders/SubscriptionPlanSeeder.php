<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        // Harga placeholder — ubah dari Admin > Paket Langganan
        $plans = [
            ['name' => '1 Bulan',  'slug' => '1-bulan',  'duration_days' => 30,  'price' => 49000,  'is_popular' => false, 'sort_order' => 1,
             'description' => 'Akses semua materi premium selama 1 bulan.'],
            ['name' => '3 Bulan',  'slug' => '3-bulan',  'duration_days' => 90,  'price' => 129000, 'is_popular' => true,  'sort_order' => 2,
             'description' => 'Akses semua materi premium selama 3 bulan.'],
            ['name' => '1 Tahun',  'slug' => '1-tahun',  'duration_days' => 365, 'price' => 449000, 'is_popular' => false, 'sort_order' => 3,
             'description' => 'Akses semua materi premium selama 1 tahun.'],
        ];

        foreach ($plans as $p) {
            SubscriptionPlan::updateOrCreate(['slug' => $p['slug']], $p + ['is_active' => true]);
        }
    }
}
