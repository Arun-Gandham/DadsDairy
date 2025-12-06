<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'details', 'price', 'quantity', 'image', 'images', 'category_id', 'is_active', 'type'];

    protected $casts = [
        'price'     => 'decimal:2',
        'is_active' => 'boolean',
        'images'    => 'array',
    ];

    /**
     * Get the category this product belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all cart items for this product
     */
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all order items for this product
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get all subscriptions for this product
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
