<?php

// app/Models/OrderDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
         'restaurant_id', 'user_id', 'quantity', 'price',
    ];

    // Define the relationship with the order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define the relationship with the restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Define the relationship with the menu item
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
