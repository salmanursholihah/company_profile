<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('halaman_utama') && !Schema::hasTable('halaman_utamas')) {
            Schema::rename('halaman_utama', 'halaman_utamas');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('halaman_utamas')) {
            Schema::rename('halaman_utamas', 'halaman_utama');
        }
    }
};
