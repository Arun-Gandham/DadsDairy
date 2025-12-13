<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('door_number', 20)->nullable()->after('delivery_address');
            $table->string('street', 50)->nullable()->after('door_number');
            // $table->string('area', 50)->nullable()->after('street'); // removed
            $table->string('city', 50)->nullable()->after('street');
            $table->string('state', 50)->nullable()->after('city');
            $table->string('pin_code', 10)->nullable()->after('state');
            $table->decimal('latitude', 10, 7)->nullable()->after('pin_code');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
        });
    }
    public function down(): void {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['door_number', 'street', 'city', 'state', 'pin_code', 'latitude', 'longitude']);
            // 'area' column is not dropped because it was never added
        });
    }
};
