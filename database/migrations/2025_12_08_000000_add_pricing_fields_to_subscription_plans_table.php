<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->nullable()->after('price_per_unit');
            $table->decimal('discounted_price', 10, 2)->nullable()->after('total_price');
        });
    }
    public function down(): void {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'discounted_price']);
        });
    }
};
