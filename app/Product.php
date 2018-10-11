<?php

namespace App;

class Product extends Model
{
    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
