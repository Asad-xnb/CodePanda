<?php

// app/Models/MenuItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id', 'name', 'description', 'price',
    ];

    // Define the relationship with the restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Define the relationship with order details
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
