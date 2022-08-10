<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chart extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'quantity',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}