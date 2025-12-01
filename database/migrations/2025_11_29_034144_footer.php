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
    Schema::create('footers', function (Blueprint $table) {
        $table->id();
        $table->string('company_name')->nullable();
        $table->text('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        // JSON columns
        $table->json('useful_links')->nullable();
        $table->json('our_services')->nullable();
        $table->json('social_links')->nullable();

        $table->string('tagline')->nullable();
        $table->string('copyright')->nullable();
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
