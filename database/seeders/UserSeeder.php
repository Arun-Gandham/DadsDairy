<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin user
        $adminRole = Role::where('slug', 'admin')->first();
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role_id'  => $adminRole->id,
            'phone'    => '9876543210',
            'address'  => '123 Admin Street, City',
        ]);

        // Create Customer user
        $customerRole = Role::where('slug', 'customer')->first();
        User::create([
            'name'     => 'John Customer',
            'email'    => 'customer@example.com',
            'password' => Hash::make('password123'),
            'role_id'  => $customerRole->id,
            'phone'    => '9876543211',
            'address'  => '456 Customer Lane, City',
        ]);

        // Create Delivery Agent user
        $deliveryRole = Role::where('slug', 'delivery_agent')->first();
        User::create([
            'name'     => 'Delivery Agent',
            'email'    => 'delivery@example.com',
            'password' => Hash::make('password123'),
            'role_id'  => $deliveryRole->id,
            'phone'    => '9876543212',
            'address'  => '789 Delivery Avenue, City',
        ]);

        // Create some sample categories
        $categories = [
            ['name' => 'Fresh Milk', 'slug' => 'fresh-milk', 'description' => 'Fresh daily milk'],
            ['name' => 'Yogurt', 'slug' => 'yogurt', 'description' => 'Healthy yogurt products'],
            ['name' => 'Cheese', 'slug' => 'cheese', 'description' => 'Variety of cheese'],
            ['name' => 'Butter', 'slug' => 'butter', 'description' => 'Pure butter'],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::create($cat);
        }

        // Create sample products
        $products = [
            [
                'name'        => 'Full Cream Milk 1L',
                'slug'        => 'full-cream-milk-1l',
                'description' => 'Pure full cream milk',
                'price'       => 45.00,
                'quantity'    => 100,
                'category_id' => 1,
                'is_active'   => true,
                'type'        => 'both',
            ],
            [
                'name'        => 'Toned Milk 1L',
                'slug'        => 'toned-milk-1l',
                'description' => 'Toned milk with essential nutrients',
                'price'       => 38.00,
                'quantity'    => 150,
                'category_id' => 1,
                'is_active'   => true,
                'type'        => 'subscribe',
            ],
            [
                'name'        => 'Greek Yogurt 500g',
                'slug'        => 'greek-yogurt-500g',
                'description' => 'Creamy Greek yogurt',
                'price'       => 80.00,
                'quantity'    => 50,
                'category_id' => 2,
                'is_active'   => true,
                'type'        => 'buy',
            ],
            [
                'name'        => 'Paneer 500g',
                'slug'        => 'paneer-500g',
                'description' => 'Fresh homemade paneer',
                'price'       => 150.00,
                'quantity'    => 40,
                'category_id' => 3,
                'is_active'   => true,
                'type'        => 'buy',
            ],
            [
                'name'        => 'Butter 500g',
                'slug'        => 'butter-500g',
                'description' => 'Pure cow butter',
                'price'       => 200.00,
                'quantity'    => 60,
                'category_id' => 4,
                'is_active'   => true,
                'type'        => 'both',
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
