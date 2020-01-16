<?php

namespace App\Http\Controllers\Admin\Machinelearning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Phpml\Clustering\KMeans;
use App\Models\Admin\Product;
use App\Models\Admin\Kmean;

class KmeanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kmeans = new KMeans(2);
        $kmeans = new KMeans(4, KMeans::INIT_RANDOM);

        //$samples = ['Label1' =>[1, 1, 1], 'Label2' =>[8, 7, 6], 'Label3' =>[1, 2, 3], 'Label4' =>[7, 8, 9], 'Label5' =>[2, 1, 6], 'Label6' =>[8, 9, 1]];
        //$samples = ['1' =>[15000000,12,1,1], '2' =>[17599000, 12, 2, 1], '3' =>[24000000,24,3,1], '4' =>[31399000,24,1,1], '7' =>[530000,12,2,3], '5' =>[18500000,12,1,1],'6' =>[1850000,12,3,2], '8' =>[430000,6,2,3], '9' =>[7000000,6,1,2], '10' =>[120000,6,3,3]];
        $listProduct = Product::get()->toArray();
        $arrayRes = [];
        foreach( $listProduct as $value ){
            $arrayRes[$value['id']] = [ $value['price'],$value['warranty'],$value['brand_id'],$value['catagory_id'] ];
        }
        
        $kmeans = new KMeans(30);
        $rules = $kmeans->cluster($arrayRes);
    //    dd($rules);
        $arrayResInsert = [];

        foreach( $rules as $key => $value ){
            foreach ( $value as $key2 => $value2 ) {
                $arrayResInsert[] = [
                // $kmea = Kmean::create([
                    'group' => $key,
                    'product_id' => $key2,
                    'price' => $value2['0'],
                    'warranty' => $value2['1'],
                    'brand_id' => $value2['2'],
                    'catagory_id' => $value2['3'],
                ];
            }
        }
        DB::table('kmeans')->insert($arrayResInsert);
        return view('admin.kmean.index',compact('rules')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
