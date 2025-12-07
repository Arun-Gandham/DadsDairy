<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'subscription_plan_id',
        'quantity',
        'frequency',
        'status',
        'next_delivery_date',
        'start_date',
        'end_date',
        'notes',
        'cancelled_at',
        'address',
        'latitude',
        'longitude',
        'door_number',
        'street',
        'area',
        'city',
        'state',
        'pin_code',
    ];

    protected $casts = [
        'next_delivery_date' => 'date',
        'start_date'         => 'date',
        'end_date'           => 'date',
        'cancelled_at'       => 'datetime',
    ];

    /**
     * Get the user that has this subscription
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product being subscribed to
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the subscription plan for this subscription
     */
    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
