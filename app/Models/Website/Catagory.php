<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
