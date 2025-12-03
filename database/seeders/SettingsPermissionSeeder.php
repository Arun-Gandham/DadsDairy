<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class SettingsPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::firstOrCreate([
            'slug' => 'manage_settings',
        ], [
            'name' => 'Manage Settings',
            'description' => 'Can view and update website/company settings',
        ]);
    }
}
