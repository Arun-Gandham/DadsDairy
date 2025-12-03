<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        if (!$adminRole) return;

        $user = User::where('email', 'admin@dadsdairy.com')->first();
        if ($user) {
            $user->role_id = $adminRole->id;
            $user->save();
        }
    }
}
