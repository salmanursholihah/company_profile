<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('halaman_utamas')) {
            Schema::table('halaman_utamas', function (Blueprint $table) {
                //
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('halaman_utamas')) {
            Schema::table('halaman_utamas', function (Blueprint $table) {
                //
            });
        }
    }
};
