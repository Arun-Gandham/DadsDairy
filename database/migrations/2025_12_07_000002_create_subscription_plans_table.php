<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. '30 days', '60 days', etc.
            $table->integer('duration_days'); // 30, 60, 90, 180, 365
            $table->decimal('price_per_unit', 8, 2); // price per milk unit
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('subscription_plans');
    }
};
