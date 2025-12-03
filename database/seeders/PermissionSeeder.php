<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Customer Permissions
            ['name' => 'View Products', 'slug' => 'view_products', 'description' => 'View product catalog'],
            ['name' => 'Add to Cart', 'slug' => 'add_to_cart', 'description' => 'Add items to cart'],
            ['name' => 'View Cart', 'slug' => 'view_cart', 'description' => 'View shopping cart'],
            ['name' => 'Checkout', 'slug' => 'checkout', 'description' => 'Complete order checkout'],
            ['name' => 'View Orders', 'slug' => 'view_orders', 'description' => 'View own orders'],
            ['name' => 'View Subscriptions', 'slug' => 'view_subscriptions', 'description' => 'View own subscriptions'],
            ['name' => 'Manage Subscriptions', 'slug' => 'manage_subscriptions', 'description' => 'Create and manage subscriptions'],
            ['name' => 'View Dashboard', 'slug' => 'view_dashboard', 'description' => 'Access customer dashboard'],

            // Delivery Agent Permissions
            ['name' => 'View Deliveries', 'slug' => 'view_deliveries', 'description' => 'View assigned deliveries'],
            ['name' => 'Update Delivery Status', 'slug' => 'update_delivery_status', 'description' => 'Update delivery status'],
            ['name' => 'View Delivery Dashboard', 'slug' => 'view_delivery_dashboard', 'description' => 'Access delivery agent dashboard'],

            // Admin Permissions
            ['name' => 'Manage Products', 'slug' => 'manage_products', 'description' => 'Create, edit, delete products'],
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', 'description' => 'Create, edit, delete categories'],
            ['name' => 'View All Orders', 'slug' => 'view_all_orders', 'description' => 'View all orders in system'],
            ['name' => 'Manage Orders', 'slug' => 'manage_orders', 'description' => 'Update order status'],
            ['name' => 'View All Users', 'slug' => 'view_all_users', 'description' => 'View all users'],
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'description' => 'Create, edit, delete users'],
            ['name' => 'Manage Roles', 'slug' => 'manage_roles', 'description' => 'Manage roles and permissions'],
            ['name' => 'View Admin Dashboard', 'slug' => 'view_admin_dashboard', 'description' => 'Access admin dashboard'],
            ['name' => 'View Reports', 'slug' => 'view_reports', 'description' => 'View sales and analytics reports'],
            // Settings Permission
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'description' => 'Manage site/company settings'],
            // Coupon Permissions
            ['name' => 'Manage Coupons', 'slug' => 'manage_coupons', 'description' => 'Create, edit, delete coupons'],
            ['name' => 'View Coupons', 'slug' => 'view_coupons', 'description' => 'View all coupons'],
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::firstOrCreate(['slug' => $permission['slug']], $permission);
        }

        // Assign permissions to roles
        $this->assignPermissionsToRoles();
    }

    private function assignPermissionsToRoles(): void
    {
        // Customer role permissions
        $customerRole = \App\Models\Role::where('slug', 'customer')->first();
        if ($customerRole) {
            $customerPermissions = [
                'view_products',
                'add_to_cart',
                'view_cart',
                'checkout',
                'view_orders',
                'view_subscriptions',
                'manage_subscriptions',
                'view_dashboard',
            ];

            foreach ($customerPermissions as $permissionSlug) {
                $permission = \App\Models\Permission::where('slug', $permissionSlug)->first();
                if ($permission && ! $customerRole->permissions()->where('permission_id', $permission->id)->exists()) {
                    $customerRole->permissions()->attach($permission->id);
                }
            }
        }

        // Delivery Agent role permissions
        $deliveryRole = \App\Models\Role::where('slug', 'delivery_agent')->first();
        if ($deliveryRole) {
            $deliveryPermissions = [
                'view_deliveries',
                'update_delivery_status',
                'view_delivery_dashboard',
            ];

            foreach ($deliveryPermissions as $permissionSlug) {
                $permission = \App\Models\Permission::where('slug', $permissionSlug)->first();
                if ($permission && ! $deliveryRole->permissions()->where('permission_id', $permission->id)->exists()) {
                    $deliveryRole->permissions()->attach($permission->id);
                }
            }
        }

        // Admin role permissions - all permissions
        $adminRole = \App\Models\Role::where('slug', 'admin')->first();
        if ($adminRole) {
            $adminPermissions = \App\Models\Permission::pluck('id')->toArray();

            foreach ($adminPermissions as $permissionId) {
                if (! $adminRole->permissions()->where('permission_id', $permissionId)->exists()) {
                    $adminRole->permissions()->attach($permissionId);
                }
            }
        }
    }
}
