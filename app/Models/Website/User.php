<?php

namespace App\Models\Website;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'code', 'name', 'username', 'password', 'email', 'birthday', 'gender', 'address', 'phone', 'rule', 'status',
    ];

    public function isAdmin(){
        return $this->rule == 1 && $this->rule == 2;
    }

    public function isCustomer(){
        return $this->rule == 3;
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
