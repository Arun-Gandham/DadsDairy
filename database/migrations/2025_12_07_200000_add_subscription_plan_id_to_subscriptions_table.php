<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreignId('subscription_plan_id')->after('product_id')->constrained('subscription_plans')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['subscription_plan_id']);
            $table->dropColumn('subscription_plan_id');
        });
    }
};
