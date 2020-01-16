<?php

namespace App\Http\Controllers\Website\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use App\Models\Admin\Apriori;
use App\Models\Admin\Kmean;

class DetailController extends Controller
{
    public function detail(Product $product)
    {
        $catagories = Catagory::all();
        $newProduct = Product::latest()->get();
        
        //Hiển thị sản phẩm thường mua cũng
        $id = $product->id;
        $apriori = Apriori::where('antecedent','LIKE', "%{$id}%")->get();

        $recommand_ids = [];
        $recommands = [];
        foreach($apriori as $rcm) {

           array_push($recommand_ids, json_decode($rcm->consequent));
        }
        foreach($recommand_ids as $id) {
            $product_id = Product::where('id', $id)->get()->first();
            if(!in_array($product_id,$recommands))
            {
                array_push($recommands,$product_id);
                
            }
        }
        //dd($recommands);
        //Hiển thị sản phẩm tương tự
        $id1 = $product->id;
        $pro_kmean = Kmean::where('product_id',$id1)->get();
        foreach($pro_kmean as $km)
        {
            $pro_kmean = $km->group;
        }
        $kmean = Kmean::where('group',$pro_kmean)->get();
        
        //dd($kmean);
        $array_product = array();
        foreach($kmean as $kmea)
        {
            $products = Product::find($kmea->product_id); 
            if(!in_array($products,$array_product))
            {
                array_push($array_product,$products);
            }
        }
        //dd($array_product);
        return view('website.products.detail', compact('catagories','product','newProduct', 'recommands','kmean','array_product'));
    }
}
