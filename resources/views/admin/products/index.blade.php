@extends('admin.layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">                    
                <div class="card">
                    <div class="card-header">
                        <h1>Quản lý sản phẩm</h1>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-danger">
                            {{session('notification')}}
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Ảnh</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Bảo hành</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    @php
                                        $product_decode = json_decode($product->image,true);
                                    @endphp
                                    <tr style="text-align: center">
                                        <td>{{$product->id}}</td>
                                        <td>
                                        @if(isset($product_decode))
                                            @foreach($product_decode as $pd)
                                                <img style="width:50px;height:50px" src="{{asset($pd)}}" />
                                                @break
                                            @endforeach
                                        @endif
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->warranty }}</td>
                                        <td>
                                            @if ($product->status == '1' || $product->quantity >=1)
                                                {{"Còn hàng"}}
                                            @elseif($product->status == '2' || $product->quantity <1)
                                                {{"Đã hết hàng"}}
                                            @elseif($product->status == '3' || $product->quantity <1)
                                                {{"Dừng hoạt động"}}
                                            @endif   
                                        </td>
                                        <td>{{ $product->created_at->format('d/m/y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                                class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a id="btnDelete" onclick="putLinkDelete(this)" data-action ="{{ route('admin.products.destroy', $product) }}" href="#popupDelete" class="btn btn-delete btn-danger btn-xs">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
        </div>
        <div  id="popupDelete" style="text-align: center; border-radius:5px; display: none">
            <form action="#" id="form-del-products" method ="POST">
                @csrf
                @method('DELETE')
                    <h2 >Thông báo</h2>
                    <p>Bạn có chắc chắn muốn xóa?</p>
                    <button style="margin-right:15px" type="submit" class="btn btn-primary">Đồng ý</button>
                    <a href="{{ route('admin.products.index') }}">
                        <button style="margin-left:15px" type="button" class="btn btn-danger">Hủy bỏ</button>
                    </a>
            </form>
        </div>
    </div> 
    <!-- /.content -->
@endsection
@push('scripts')
<script>
    function putLinkDelete(e){
        var url = $(e).data("action");
        $("#form-del-products").attr('action', url);
    }

    $(document).ready(function(){
         $("#example2").DataTable();
    });

    </script>
@endpush