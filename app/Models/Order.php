<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'total',
        'status',
        'order_string',
        'address',
    ];

}
