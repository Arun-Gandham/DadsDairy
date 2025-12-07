<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class SubscriptionPlanPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::firstOrCreate([
            'slug' => 'manage_subscription_plans',
        ], [
            'name' => 'Manage Subscription Plans',
            'description' => 'Allows admin to create, edit, and delete subscription plans.'
        ]);
    }
}
