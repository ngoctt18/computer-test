<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Models\Admin\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistic::all();
        return view('admin.layouts.index', compact(['statistics']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // statistic::create($request->all());

        // session()->flash('msg.success', 'Thêm mới thành công');
        // return redirect()->route('admin.statistics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        // return view('admin.statistics.edit', compact(['statistic']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        // $statistic->update($request->all());

        // session()->flash('msg.success', 'Cập nhật thành công');
        // return redirect()->route('admin.statistics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(statistic $statistic)
    {
        // $statistic->delete();

        // session()->flash('msg.success', 'Xóa thành công');
        // return redirect()->route('admin.statistics.index');
    }
}
