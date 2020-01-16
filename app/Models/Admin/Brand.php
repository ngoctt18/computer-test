<?php

namespace App\Models\Admin;

use Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'code', 'image', 'name'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
