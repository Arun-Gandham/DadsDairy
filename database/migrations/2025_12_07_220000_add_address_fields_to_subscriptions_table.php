<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('door_number', 20)->nullable()->after('longitude');
            $table->string('street', 50)->nullable()->after('door_number');
            $table->string('area', 50)->nullable()->after('street');
            $table->string('city', 50)->nullable()->after('area');
            $table->string('state', 50)->nullable()->after('city');
            $table->string('pin_code', 10)->nullable()->after('state');
        });
    }
    public function down(): void {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['door_number', 'street', 'area', 'city', 'state', 'pin_code']);
        });
    }
};
