<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Kolom products.image dibuat NOT NULL tanpa default, sehingga tambah produk
     * tanpa gambar gagal (SQLSTATE 1364). Jadikan nullable.
     */
    public function up(): void
    {
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'image')) {
            DB::statement('ALTER TABLE `products` MODIFY `image` VARCHAR(255) NULL');
        }
    }

    public function down(): void
    {
        //
    }
};
