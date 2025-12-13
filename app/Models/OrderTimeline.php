<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status',
        'state',
        'changed_at',
        'note',
    ];
    public function isInProgress()
    {
        return $this->state === 'in_progress';
    }

    public function isCompleted()
    {
        return $this->state === 'completed';
    }

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
