<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $guarded = [];


    // get city
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // get province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}