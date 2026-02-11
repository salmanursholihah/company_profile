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
        Schema::table('katalogs', function (Blueprint $table) {
            $table->string('kode_produk', 100)->nullable()->after('name');
            $table->string('brand')->nullable()->after('kode_produk');
            $table->string('model_produk')->nullable()->after('brand');
            $table->string('seri_produk')->nullable()->after('model_produk');
        });
    }

    public function down(): void
    {
        Schema::table('katalogs', function (Blueprint $table) {
            $table->dropColumn([
                'kode_produk',
                'brand',
                'model_produk',
                'seri_produk'
            ]);
        });
    }
};
