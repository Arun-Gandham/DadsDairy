<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Administrator - Full access to system',
            ],
            [
                'name'        => 'Customer',
                'slug'        => 'customer',
                'description' => 'Customer - Can view products and place orders',
            ],
            [
                'name'        => 'Delivery Agent',
                'slug'        => 'delivery_agent',
                'description' => 'Delivery Agent - Can manage deliveries',
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::firstOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
