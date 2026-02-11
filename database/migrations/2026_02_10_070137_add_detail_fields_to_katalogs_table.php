<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('katalogs', function (Blueprint $table) {

        $table->text('preview_desc')->nullable()->after('deskripsi');
        $table->string('kategori')->nullable()->after('company');
        $table->text('spesifikasi')->nullable()->after('kategori');

    });
}


  public function down(): void
{
    Schema::table('katalogs', function (Blueprint $table) {

        $table->dropColumn([
            'preview_desc',
            'kategori',
            'spesifikasi'
        ]);

    });
}

};
