<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Admin\Brand;
use App\Models\Admin\Catagory;
use App\Models\Admin\Product;
use App\Models\Admin\OrderDetail;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;

use App\Http\Controllers\Admin\Orders\OrderController;

class ProductController extends Controller
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
        $products = Product::orderBy('status','asc')->latest()->get();
        return view('admin.products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $catagories = Catagory::all();
        return view('admin.products.create', compact(['brands','catagories']));
    }

    /**
     * Store a newly created resource in storage.
     *s
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //StoreProductRequest
    public function store(StoreProductRequest $request)
    {
        $data = $request->except(['image']);
        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        if($request->has('image')) {

            $images_request = $request->image;
            $array_add = array();
            foreach($images_request as $ir)
            {
                $img_name = $ir->getClientOriginalName();
                $file_ext = $ir->getClientOriginalExtension();
                $dir = 'uploads/products';
                if(in_array($file_ext, $allow_type)){
                    $ir = $this->imageUploadService->upload($ir, $dir); 
                    array_push($array_add,$ir);
                }
            }
            $json_string = json_encode($array_add);
            $data['image'] = $json_string;
            $request->image = $json_string;
        }
        else
        {
            $request->image = '';
        }
        $product = Product::create($data);
        session()->flash('msg.success', 'Thêm mới thành công');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        $brands = Brand::all();
        $catagories = Catagory::all();
        $url = $product->image;
        $url = json_decode($url);
        
        return view('admin.products.edit', compact(['product', 'brands', 'catagories', 'url']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->image);
        
        $brands = Brand::all();
        $catagories = Catagory::all();
        
        
        $data = $request->except(['image']);
        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
        if($request->has('image')) {

            $images_request = $request->image;
            $array_add = array();
            foreach($images_request as $ir)
            {
                $img_name = $ir->getClientOriginalName();
                $file_ext = $ir->getClientOriginalExtension();
                $dir = 'uploads/products';
                if(in_array($file_ext, $allow_type)){
                    $ir = $this->imageUploadService->upload($ir, $dir); 
                    array_push($array_add,$ir);
                }
            }
            $json_string = json_encode($array_add);
            $data['image'] = $json_string;
            $request->image = $json_string;
        }
        else
        {
            $request->image = '';
        }
        // dd($request->image);
        $product->update($data);

        session()->flash('msg.success', 'Cập nhật thành công');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $count = count(OrderDetail::where('product_id',$product->id)->get());
        //dd($count);
        if($count < 0){
            $product->delete();

            session()->flash('msg.success', 'Xóa thành công');
            return redirect()->route('admin.products.index');
        }
        else
        {
            return redirect()->route('admin.products.index')->with('notification','Sản phẩm đã tồn tại trong đơn hàng. Xóa không thành công!!!');
        }  
    }
}
