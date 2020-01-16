<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Models\Admin\Brand;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Models\Admin\Product;
class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin.brands.index', compact(['brands']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();

        return view('admin.brands.create', compact(['brands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->only(['code', 'image', 'name']);

        if($request->has('image')) {
            $dir = 'uploads/brands';
            $image = $this->imageUploadService->upload($request->file('image'), $dir);
            $data['image'] = $image;
        }

        Brand::create($data);

        session()->flash('msg.success', 'Thêm mới thành công');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact(['brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->all();
        if($request->has('image')) {
            $dir = 'uploads/brands';
            $image = $this->imageUploadService->upload($request->file('image'), $dir);
            $data['image'] = $image;
        }
        $brand->update($data);

        session()->flash('msg.success', 'Cập nhật thành công');
        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $count = count(Product::where('brand_id',$brand->id)->get());
        // dd($count);
        if($count <= 0){
            $brand->delete();
            session()->flash('msg.success', 'Xóa thành công');
            return redirect()->route('admin.brands.index');
        }
        else
        {
            return redirect()->route('admin.brands.index')->with('notification','Có tồn tại sản phẩm trong hãng!!!');
        }
        
    }
}
