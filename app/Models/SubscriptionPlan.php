<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'product_id',
        'name', // e.g. '30 days', '60 days', etc.
        'duration_days', // integer: 30, 60, 90, 180, 365
        'ml', // e.g. 500ml, 1L
        'price_per_unit', // price per milk unit for this plan
        'total_price', // total price before discount
        'discounted_price', // price after discount
        'active', // bool
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
