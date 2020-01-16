<?php

namespace App\Http\Controllers\Website\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Order;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use Cart;

class CartController extends Controller
{
    public function cart()
    {
        $contents = Cart::content();
        $total = Cart::total();
        $subTotal = Cart::subtotal();
        // return $contents;
        $catagories = Catagory::all();
        $products = Product::all();
        return view('website.orders.cart', compact('catagories','products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name, 
            'qty' => $request->qty, 
            'price' => $product->price, 
            'options' => [
                'image' => $product->image,
            ]
        ]);

        return redirect()->route('orders.cart');
    }

    public function deleteCart($id)
    {
        Cart::remove($id);

        return redirect()->route('orders.cart');
    }

    public function updateCart($id, Request $request)
    {
        $quantity = $request->quantity;
        $cart = Cart::update($id, $quantity);
        return response()->json([
            'status' => '1',
            "cart" => $cart
        ]);
    }
    
}
