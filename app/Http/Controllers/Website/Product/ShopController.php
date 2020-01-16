<?php

namespace App\Http\Controllers\Website\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use App\Models\Website\Brand;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $catagories = Catagory::all();
        $products = Product::paginate(15);
        $brands = Brand::all();
        
        $search = $request->search;
        
        if($request->search) {
            $products = Product::search($request->search)->paginate(15);
        }


        return view('website.products.shop', compact('catagories','products','brands', 'search'));
    }

    public function category(Request $request){
        $nameCategory = $request->name;
        $size = $request->size;
        $catagories = Catagory::all();
        $brands = Brand::all();
        $catagory = Catagory::whereName($nameCategory)->first();
        $products = $catagory->products()->paginate(15);
        // dd($products);
        // $color = Product::whereColor($color)->get();;

        return view('website.products.shop', compact('catagories', 'products', 'brands'));
    }

    public function brand(Request $request){
        $nameBrand = $request->name;
        $brands = Brand::all();
        $catagories = Catagory::all();
        $brand = Brand::whereName($nameBrand)->first();
        $products = $brand->products()->paginate(15);

        return view('website.products.shop', compact('brands', 'products', 'catagories'));
    }

    public function createdateproduct(Request $request){
        $catagories = Catagory::all();
        return view('website.products.shop', compact('catagories'));
    }
}
