<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Kmean extends Model
{
    protected $table = 'kmeans';
    protected $fillable = [
        'product_id','price','warranty','brand_id','catagory_id','group', 'created_at','updated_at'
    ];
}
