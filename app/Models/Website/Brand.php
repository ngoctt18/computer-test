<?php

namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // protected $table = 'brand';
    protected $fillable = [
        'code', 'image', 'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
