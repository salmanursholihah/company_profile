<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Token FCM per perangkat. Satu user boleh punya banyak perangkat.
        Schema::create('device_tokens', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->string('token', 512)->unique();
            $t->string('platform', 20)->nullable();
            $t->string('device_name', 100)->nullable();
            $t->dateTime('last_used_at')->nullable();
            $t->timestamps();
        });

        // Kotak masuk notifikasi (riwayat + badge belum dibaca).
        // Nama "app_notifications" agar tidak bentrok dengan tabel bawaan Laravel.
        Schema::create('app_notifications', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->string('type', 50);
            $t->string('title');
            $t->text('body');
            $t->json('data')->nullable();
            $t->string('dedupe_key')->nullable()->unique(); // cegah notifikasi ganda
            $t->dateTime('read_at')->nullable();
            $t->timestamps();

            $t->index(['user_id', 'read_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app_notifications');
        Schema::dropIfExists('device_tokens');
    }
};
