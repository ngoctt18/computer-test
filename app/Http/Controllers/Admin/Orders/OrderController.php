<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Models\Admin\Order;
use App\Models\Admin\Product;
use App\Http\Requests\Admin\StoreOrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\OrderDetail;

use App\Http\Controllers\Admin\Orders\OrderController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('status','asc')->latest()->get();
        return view('admin.orders.index', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact(['order']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // dd($request->delivered);
        if($request->status == 4)
        {
            $order_detail = OrderDetail::where('order_id',$order->id)->get();
            foreach($order_detail as $od)
            {
                $product = Product::find($od->product_id);
                $product->quantity = $product->quantity + $od->quantity;
                $product->save();
                $od->quantity = 0;
                $od->save();
            }   
        }
        $orderdetail = OrderDetail::all();
        $products = Product::all();

        $data = $request->all();
        $order->update($data);

        session()->flash('msg.success', 'Cập nhật thành công');
        return redirect()->route('admin.orders.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $count = count(OrderDetail::where('order_id',$order->id)->get());
        // dd($count);
        if($count < 0){
            $order->delete();
            session()->flash('msg.success', 'Xóa thành công');
            return redirect()->route('admin.orders.index');
        }
        else
        {
            $order_detail = OrderDetail::where('order_id',$order->id)->get();
            foreach($order_detail as $od)
            {
                $od->delete();
            }
            $order->delete();
            // $orDetail = OrderDetail::with('likes')->whereId($order)->delete();
            // $orDetail->delete();
            // dd($orDetail->delete());
            // $order->delete();

            session()->flash('msg.success', 'Xóa thành công');
            return redirect()->route('admin.orders.index');
        }  

    }
}
