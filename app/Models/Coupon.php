<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount_value',
        'max_uses',
        'times_used',
        'usage_per_user',
        'applicable_to',
        'applicable_product_ids',
        'valid_from',
        'valid_till',
        'min_order_value',
        'is_active',
    ];

    protected $casts = [
        'discount_value'         => 'decimal:2',
        'min_order_value'        => 'decimal:2',
        'valid_from'             => 'date',
        'valid_till'             => 'date',
        'applicable_product_ids' => 'array',
        'is_active'              => 'boolean',
    ];

    /**
     * Get all usages for this coupon
     */
    public function usages()
    {
        return $this->hasMany(CouponUsage::class);
    }

    /**
     * Get all orders that used this coupon
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if coupon is valid
     */
    public function isValid($userId = null)
    {
        // Check if active
        if (! $this->is_active) {
            return false;
        }

        // Check date validity
        $today = now()->toDateString();
        if ($this->valid_from && $today < $this->valid_from->toDateString()) {
            return false;
        }
        if ($this->valid_till && $today > $this->valid_till->toDateString()) {
            return false;
        }

        // Check max uses
        if ($this->max_uses && $this->times_used >= $this->max_uses) {
            return false;
        }

        // Check usage per user
        if ($userId) {
            $userUsages = $this->usages()->where('user_id', $userId)->count();
            if ($userUsages >= $this->usage_per_user) {
                return false;
            }
        }

        return true;
    }

    /**
     * Calculate discount amount
     */
    public function calculateDiscount($orderTotal, $applicableAmount = null)
    {
        $amount = $applicableAmount ?? $orderTotal;

        if ($this->discount_type === 'percentage') {
            return ($amount * $this->discount_value) / 100;
        }

        return min($this->discount_value, $amount);
    }
}
