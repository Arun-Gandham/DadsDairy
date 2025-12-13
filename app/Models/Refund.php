<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status', // initiated, completed, failed
        'amount',
        'initiated_at',
        'completed_at',
        'note',
    ];

    protected $casts = [
        'initiated_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
