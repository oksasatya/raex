<?php

namespace App;

use App\Http\Resources\Cities;
use App\Http\Resources\Provinces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'chart_id',
        'status',
        'origin',
        'destination',
        'weight',
        'courier',
        'cost',
        'payment_status',
    ];

    public const STATUS_BELUM_DIBAYAR = 1;
    public const STATUS_SUDAH_DIBAYAR = 2;

    // status pengiriman
    public const STATUS_BELUM_DIKIRIM = 1;
    public const STATUS_SUDAH_DIKIRIM = 2;
    public const STATUS_SELESAI = 3;

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function provinces()
    {
        return new Provinces(Province::get());
    }

    public function cities()
    {
        return new Cities(City::get());
    }
    public function getPaymentStatusAttribute($value)
    {
        return $value == 1 ? 'Belum Dibayar' : 'Sudah Dibayar';
    }

    // get status pengiriman
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Belum Dikirim' : ($value == 2 ? 'Sudah Dikirim' : 'Selesai');
    }
}