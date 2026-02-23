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
        Schema::table('images', function (Blueprint $table) {

             $table->string('type')->nullable()->after('image_path');
            $table->boolean('is_active')
                ->default(true)
                ->after('type');

            $table->integer('sort_order')
                ->default(0)
                ->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('is_active');
            $table->dropColumn('sort_order');
        });
    }
};
