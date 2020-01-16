<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'detail','price', 'image', 'price_new', 'quantity', 'feature', 'use', 'warranty', 'color','brand_id', 'catagory_id','status', 'year' 
        // 'screen_size', 'storage_type', 'size','rom', 'ram', 'graphics',
        // 'processorModel', 'openrating_system','battery', 'headphone_jack', 'number_of_usb','number_of_hdmi', 
        // 'hard_drive_interface', 'processor','webcam', 'name','meterial', 'model_number',
        // 'UPC','view', , 'weight', 'numberic_keyboard', 'optical_drive_type'
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'Like', "%$value%")
                ->orWhere('code', $value)
                ->orWhere('color', $value)
                ->orWhere('price', 'Like', "%$value%")
                ->whereHas('brand',  function($query)use($value){     
                    $query->orWhere('name', 'Like', "%$value%");
                });
    }
    
    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDatail::class);
    }
}
