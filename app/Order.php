<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'chart_id',
        'quantity',
        'status',
        'total_price',
        'payment_status',
    ];

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}