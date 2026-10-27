<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Menambah role "blogger" pada kolom users.role (ENUM MySQL).
 * Blogger hanya boleh membuka fitur Blog Artikel di panel admin.
 */
return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE users MODIFY role ENUM('super_admin','vendor','user','blogger') NOT NULL");
    }

    public function down(): void
    {
        // jadikan 'user' dulu agar tidak error saat enum dikecilkan lagi
        DB::table('users')->where('role', 'blogger')->update(['role' => 'user']);
        DB::statement("ALTER TABLE users MODIFY role ENUM('super_admin','vendor','user') NOT NULL");
    }
};
