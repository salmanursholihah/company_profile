<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('slug')->unique();
            $t->text('description')->nullable();
            $t->unsignedInteger('duration_days');
            $t->decimal('price', 12, 2);
            $t->boolean('is_popular')->default(false);
            $t->boolean('is_active')->default(true);
            $t->unsignedInteger('sort_order')->default(0);
            $t->timestamps();
        });

        // 1 user = 1 baris langganan (diperpanjang, bukan dibuat ulang)
        Schema::create('user_subscriptions', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $t->foreignId('plan_id')->nullable()->constrained('subscription_plans')->nullOnDelete();
            $t->dateTime('started_at');
            $t->dateTime('expires_at');
            $t->enum('source', ['payment', 'manual'])->default('payment');
            $t->timestamps();
        });

        Schema::create('subscription_invoices', function (Blueprint $t) {
            $t->id();
            $t->string('invoice_number')->unique();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->foreignId('plan_id')->nullable()->constrained('subscription_plans')->nullOnDelete();
            $t->decimal('total_amount', 12, 2);
            $t->enum('status', ['pending', 'paid', 'expired', 'cancelled'])->default('pending');
            $t->dateTime('due_at');
            $t->dateTime('paid_at')->nullable();
            $t->timestamps();
        });

        Schema::create('va_payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('invoice_id')->unique()->constrained('subscription_invoices')->cascadeOnDelete();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->string('bank', 20);
            $t->string('va_number')->nullable();
            $t->string('va_name')->nullable();
            $t->string('biller_code')->nullable();      // khusus Mandiri Bill
            $t->decimal('amount', 12, 2);
            $t->enum('status', ['pending', 'paid', 'expired', 'cancelled'])->default('pending');
            $t->string('transaction_id')->nullable();
            $t->dateTime('expired_at')->nullable();
            $t->dateTime('paid_at')->nullable();
            $t->json('bank_response')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('va_payments');
        Schema::dropIfExists('subscription_invoices');
        Schema::dropIfExists('user_subscriptions');
        Schema::dropIfExists('subscription_plans');
    }
};
