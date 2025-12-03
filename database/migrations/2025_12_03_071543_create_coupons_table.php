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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('discount_type', ['fixed', 'percentage'])->default('percentage');
            $table->decimal('discount_value', 8, 2);
            $table->integer('max_uses')->nullable();
            $table->integer('times_used')->default(0);
            $table->integer('usage_per_user')->default(1);
            $table->enum('applicable_to', ['all', 'first_order_only', 'subscription_only', 'specific_products'])->default('all');
            $table->json('applicable_product_ids')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->decimal('min_order_value', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
