<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'pizza_id', 'id');
    }
}
