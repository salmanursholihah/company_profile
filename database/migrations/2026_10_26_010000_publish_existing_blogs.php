<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Form admin dulu tidak punya field status, sehingga semua artikel tersimpan
     * sebagai 'draft' dan disaring oleh API mobile (hanya menampilkan 'published').
     * Tandai artikel yang sudah ada sebagai published.
     */
    public function up(): void
    {
        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'status')) {
            DB::table('blogs')->where('status', 'draft')->update(['status' => 'published']);
        }
    }

    public function down(): void
    {
        //
    }
};
