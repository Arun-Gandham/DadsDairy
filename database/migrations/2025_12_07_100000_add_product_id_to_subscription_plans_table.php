<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->foreignId('product_id')->after('id')->constrained('products')->onDelete('cascade');
            $table->string('ml')->after('duration_days'); // e.g. 500ml, 1L
        });
    }
    public function down(): void {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn(['product_id', 'ml']);
        });
    }
};
