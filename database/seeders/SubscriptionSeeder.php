<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Product;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $product = Product::first();
        $plan = $product ? $product->subscriptionPlans()->first() : null;
        if ($user && $product && $plan) {
            Subscription::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'subscription_plan_id' => $plan->id,
                'start_date' => now()->toDateString(),
                'frequency' => 'daily',
                'status' => 'active',
                'next_delivery_date' => now()->toDateString(),
                'quantity' => 1,
                'notes' => 'Sample subscription',
            ]);
        }
    }
}
