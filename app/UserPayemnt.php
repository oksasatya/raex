<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayemnt extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'images'
    ];



    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}