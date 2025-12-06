<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // MySQL only: modify ENUM to add 'special_users'
        DB::statement("ALTER TABLE coupons MODIFY applicable_to ENUM('all','first_order_only','subscription_only','specific_products','special_users') DEFAULT 'all'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ENUM to previous values (without 'special_users')
        DB::statement("ALTER TABLE coupons MODIFY applicable_to ENUM('all','first_order_only','subscription_only','specific_products') DEFAULT 'all'");
    }
};
