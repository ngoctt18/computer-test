<?php

namespace App\Models\Admin;

use Catagory;
use Brand;
use Cart;
use OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'detail','price', 'image', 'price_new',
        // 'screen_size', 'storage_type', 'size','rom', 'ram', 'graphics',
        'quantity','warranty', 'feature', 'use',
        //  'processorModel', 'openrating_system','battery', 'headphone_jack', 'number_of_usb','number_of_hdmi', 
        // 'hard_drive_interface', 'processor','webcam', 'name', 'meterial', 'model_number', 
        'color','brand_id', 'catagory_id',  'year','status'
        // 'UPC','view',  'weight', 'numberic_keyboard', 'optical_drive_type'
    ];
    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDatail::class);
    }
}
