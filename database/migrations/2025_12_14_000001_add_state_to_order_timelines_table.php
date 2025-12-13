<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('order_timelines', function (Blueprint $table) {
            $table->enum('state', ['in_progress', 'completed', 'cancelled'])->default('in_progress')->after('status');
        });
    }
    public function down(): void {
        Schema::table('order_timelines', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
};
