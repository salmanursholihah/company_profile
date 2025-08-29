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
        Schema::create('product_vendors', function (Blueprint $table) {
    $table->id();
    $table->foreignId('vendor_id')->constrained('users')->onDelete('cascade');
    $table->string('name');
    $table->string('slug')->unique();
    $table->string('category');
    $table->text('description');
    $table->decimal('price', 15, 2);
    $table->integer('stock');
    $table->string('image')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
