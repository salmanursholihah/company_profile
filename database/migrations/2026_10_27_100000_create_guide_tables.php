<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guide_categories', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('slug')->unique();
            $t->unsignedInteger('sort_order')->default(0);
            $t->boolean('is_active')->default(true);
            $t->timestamps();
        });

        Schema::create('guides', function (Blueprint $t) {
            $t->id();
            $t->foreignId('category_id')->nullable()->constrained('guide_categories')->nullOnDelete();
            $t->string('title');
            $t->string('slug')->unique();
            $t->text('summary')->nullable();
            $t->longText('description')->nullable();
            $t->string('cover_path')->nullable();
            $t->enum('level', ['pemula', 'menengah', 'lanjut'])->default('pemula');
            $t->boolean('is_published')->default(true);
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });

        Schema::create('guide_lessons', function (Blueprint $t) {
            $t->id();
            $t->foreignId('guide_id')->constrained('guides')->cascadeOnDelete();
            $t->string('title');
            $t->enum('type', ['video', 'file', 'article'])->default('video');
            $t->text('description')->nullable();
            $t->string('video_url')->nullable();
            $t->longText('content')->nullable();
            $t->string('file_path')->nullable();   // disk "local" (privat)
            $t->string('file_name')->nullable();
            $t->unsignedSmallInteger('duration_minutes')->nullable();
            $t->boolean('is_free')->default(false);
            $t->boolean('is_published')->default(true);
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guide_lessons');
        Schema::dropIfExists('guides');
        Schema::dropIfExists('guide_categories');
    }
};
