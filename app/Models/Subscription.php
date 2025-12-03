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
        'quantity',
        'frequency',
        'status',
        'next_delivery_date',
        'started_at',
        'cancelled_at',
    ];

    protected $casts = [
        'next_delivery_date' => 'date',
        'started_at'         => 'datetime',
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
}
