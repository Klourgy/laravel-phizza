<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'pizza_id', 'quantity', 'active',
    ];

    public function pizza(){
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'order_id', 'id');
    }

    public function showUsername($user_id){
        $user = User::where('id', '=', $user_id)->first();

        return $user->username;
    }
}
