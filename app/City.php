<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];


    // get province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    // order
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}