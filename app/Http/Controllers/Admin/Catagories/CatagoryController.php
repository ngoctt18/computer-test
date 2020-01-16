<?php

namespace App\Http\Controllers\Admin\Catagories;

use App\Models\Admin\Catagory;
use App\Models\Admin\Product;
use App\Http\Requests\Admin\StoreCatagoryRequest;
use App\Http\Requests\Admin\UpdateCatagoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;

class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->imageUploadService = new ImageUploadService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::all();
        return view('admin.catagories.index', compact(['catagories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catagories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatagoryRequest $request)
    {
        $data = $request->only(['code', 'image', 'name']);

        if($request->has('image')) {
            $dir = 'uploads/catagories';
            $image = $this->imageUploadService->upload($request->file('image'), $dir);
            $data['image'] = $image;
        }

        Catagory::create($data);

        session()->flash('msg.success', 'Thêm mới thành công');
        return redirect()->route('admin.catagories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        return view('admin.catagories.edit', compact(['catagory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatagoryRequest $request, Catagory $catagory)
    {
        $data = $request->all();
        if($request->has('image')) {
            $dir = 'uploads/catagories';
            $image = $this->imageUploadService->upload($request->file('image'), $dir);
            $data['image'] = $image;
        }
        $catagory->update($data);

        session()->flash('msg.success', 'Cập nhật thành công');
        return redirect()->route('admin.catagories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        
        $count = count(Product::where('catagory_id',$catagory->id)->get());
        // dd($count);
        if($count <= 0){
            $catagory->delete();

            session()->flash('msg.success', 'delete successfully');
            return redirect()->route('admin.catagories.index');
        }
        else
        {
            return redirect()->route('admin.catagories.index')->with('notification','Có tồn tại sản phẩm trong danh mục!!!');
        }
    }
}
