<?php

namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'no_order',
        'status',
        'province_origin',
        'city_origin',
        'province_destination',
        'city_destination',
        'weight',
        'courier',
        'shipping_price',
        'total_price',
        'payment_status',
    ];


    // status pengiriman
    public const PENDING = 1;
    public const ON_PROGRESS = 2;
    public const DONE = 3;

    public const BELUM_DIBAYAR = 1;
    public const SUDAH_DIBAYAR = 2;

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }
}