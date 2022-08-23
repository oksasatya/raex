<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function chart()
    {
        return $this->hasMany(Chart::class);
    }
    // province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    // city
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function UserPayemnt()
    {
        return $this->belongsToMany(UserPayemnt::class);
    }
}