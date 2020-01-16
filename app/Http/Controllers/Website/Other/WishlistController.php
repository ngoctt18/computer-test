<?php

namespace App\Http\Controllers\Website\Other;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Catagory;
use App\Models\Website\Product;

class WishlistController extends Controller
{
    public function wishlist(Product $product)
    {
        $catagories = Catagory::all();
        $products = Product::all();
        return view('website.others.wishlist',compact('product', 'catagories','products'));
    }
}
