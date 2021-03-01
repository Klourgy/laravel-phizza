<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'address', 'phoneNumber', 'gender', 'role', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'order_id', 'id');
    }

}