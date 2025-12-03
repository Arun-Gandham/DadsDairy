<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'coupon_id',
        'total_amount',
        'discount_amount',
        'status',
        'payment_method',
        'delivery_type',
        'delivery_address',
        'delivery_agent_id',
        'delivered_at',
    ];

    protected $casts = [
        'total_amount'    => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'delivered_at'    => 'datetime',
        'created_at'      => 'datetime',
        'updated_at'      => 'datetime',
    ];

    /**
     * Get the coupon applied to this order
     */
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * Get the user that placed this order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the delivery agent for this order
     */
    public function deliveryAgent()
    {
        return $this->belongsTo(User::class, 'delivery_agent_id');
    }

    /**
     * Get all items in this order
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
