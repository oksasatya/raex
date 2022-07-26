<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];


    // get city
    public function city()
    {
        return $this->hasMany(City::class);
    }

    // get cost
    public function cost()
    {
        return $this->hasMany(Cost::class);
    }
    // user
    public function user()
    {
        return $this->hasMany(User::class);
    }
}