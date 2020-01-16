<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use App\Models\Website\Order;

class HomeController extends Controller
{

    public function homepage()
    {
        $catagories = Catagory::all();
        $products = Product::all();
        $productSale = Product::whereStatus('1')->get();
        $newProduct = Product::latest()->get();
        $productFeature = Product::whereStatus('3')->get();
        $randomProduct = Product::inRandomOrder()->paginate(5);
        $recentProducts = Product::latest()->paginate(5);
        $featureProduct = Product::whereStatus('3')->paginate(5);

        return view('website.layouts.index', compact('catagories','products', 'productSale','newProduct','productFeature','randomProduct','recentProducts','featureProduct'));
    }
}

    
