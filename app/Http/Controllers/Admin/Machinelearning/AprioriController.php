<?php

namespace App\Http\Controllers\Admin\Machinelearning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Phpml\Association\Apriori;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\Product;
use App\Models\Admin\Apriori as  Apri;

class AprioriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $array_set = array();
		foreach ($orders as $order) {
            $order_details = OrderDetail::where('order_id',$order->id)->get();
            $array_1 = [];

            foreach($order_details as $ord)
            {
                array_push($array_1, $ord['product_id']);
            }

            if(!empty($array_1))
                array_push($array_set,$array_1);
        }
        $labels = [];
		$associator = new Apriori($support = 0.1, $confidence = 0.5);
		$associator->train($array_set, $labels);
        $associator->apriori();
        $rules = $associator->getRules();
        foreach ($associator->getRules() as $ac)
        {
            $antecedent = json_encode($ac['antecedent']);
            $consequent = json_encode($ac['consequent']);
            $support = $ac['support'];
            $confidence = $ac['confidence'];
            $apriori = Apri::create([
                'antecedent' => $antecedent,
                'consequent' => $consequent,
                'support' => $support,
                'confidence' => $confidence,
            ]);
        }

        return view('admin.apriori.index',compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
