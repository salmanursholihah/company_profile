<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Hapus foreign key lama
    Schema::table('product_vendors', function (Blueprint $table) {
        $table->dropForeign(['vendor_id']);
        // Tambahkan foreign key baru ke tabel vendors
        $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('product_vendors', function (Blueprint $table) {
        $table->dropForeign(['vendor_id']);
        $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
    });
}

};
