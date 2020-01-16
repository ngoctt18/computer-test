<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'total_money', 'request', 'date_input', 'delivered', 'address', 'status'
    ];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
