<?php

namespace App;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
