<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    protected $fillable = [
        'restaurant_id', 'user_id', 'quantity', 'price', 'name',
   ];

   public function status()
   {
       return $this->hasOne(Status::class, "checkout_id");
   }
}
