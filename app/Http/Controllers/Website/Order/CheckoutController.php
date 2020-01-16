<?php

namespace App\Http\Controllers\Website\Order;

use App\Http\Requests\Website\CheckoutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website\Order;
use App\Models\Website\Catagory;
use App\Models\Website\Product;
use App\Models\Website\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function checkout(Order $order)
    {
        // dd(Cart::content()) ;
        $catagories = Catagory::all();
        $products = Product::all();
        return view('website.orders.checkout', compact('catagories','products'));
    }

    protected function create(array $data)
    {
        return Order::create([
            'code' => uniqid(),
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function checkoutCart(CheckoutRequest $request)
    {
        $cart = Cart::content();
        $user = Auth::user();

        $order = $user->order()->create([
            'total_money' => Cart::total(),
            'request' => $request->request,
            'date_input' => $request->date_input,
            'delivered' => $request->delivered,
            'address' => $request->address
        ]);

        foreach($cart as $cartItem) {
            $order->orderDetail()->create([
                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
                'total' => $cartItem->total
            ]);
        }
    }

    public function storeCheckout(Request $request)
    {
        $data = $request->all();
        
        // return $data;
        $order = Order::create($data);
        //dd($order);
        // dd($data);
        // $order = Order::create([
        //     'order_id'=>$order->id,
        //     'user_id'=>$request->user_id, 
        //     'total_money'=>$request->total_money,
        //     'request'=>$request->request,
        //     'date_input'=>$request->date_input,
        //     'address'=>$request->address,
        // ]);
        $content=Cart::content();
        // dd(Cart::content());
        $runout = [];
        foreach($content as $orderdetail){
            $product = Product::find($orderdetail->id);
            $oldQty = $product->quantity;
            if ($oldQty < $orderdetail->qty){
                $runout[] = $product->name;
                session()->flash('runout', $runout);
            } else {
                $product->update([
                    'quantity'=> $oldQty - $orderdetail->qty,
                ]);
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$orderdetail->id,
                    'quantity'=>$orderdetail->qty,
                    'price'=>$orderdetail->price,
                    'total'=>$orderdetail->qty * $orderdetail->price,
                ]);
                Cart::destroy();//xóa đơn hàng khi đặt hàng thành công
                session()->flash('success', 'Thêm mới thành công');
            }
        }
        // return $runout;
        // Cart::destroy();
        return redirect()->route('orders.cart');
    }

}
