<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'city_id',
        'image',
    ];
    //
    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function foods() {
        return $this->hasMany(Food::class, "restaurant_id");
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class, 'restaurant_id');
    }
}
