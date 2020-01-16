@extends('admin.layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa đơn hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.orders.update', ['id' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="card-body">
                        <!--Main form-->
                        <div class="col-md-12">
                            <div class="form-group">
                                @foreach ($errors->all() as $error)
                                <label class="text text-danger">{{$error}}</label> <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Mã đơn hàng</label>
                                    <input name="code" type="text" class="form-control" id="code" value="{{$order->id}}" placeholder=" Code" readonly>
                                    {{-- <span class="text-danger" >{{$errors->first('code')}}</span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Mã khách hàng</label>
                                    <input name="user_id" type="text" class="form-control" id="user_id" value="{{$order->user_id}}" placeholder="Usercode" readonly>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="total_money">Tổng tiền</label>
                                    <input name="total_money" type="text" class="form-control" id="total_money" value="{{$order->total_money}}" placeholder="Total money" readonly>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="date_input">Ngày tạo</label>
                                    <input name="date_input" id="date_input" value="{{$order->date_input}}"type="date" class="form-control" id="" placeholder="Date create" readonly>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{old('status', $order->status) == '1' ? 'selected' : ''}}>Mới tiếp nhận</option>
                                        <option value="2" {{old('status', $order->status) == '2' ? 'selected' : ''}}>Đang vận chuyển</option>
                                        <option value="3" {{old('status', $order->status) == '3' ? 'selected' : ''}}>Giao hàng thành công</option>
                                        <option value="4" {{old('status', $order->status) == '4' ? 'selected' : ''}}>Giao hàng không thành công</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input name="address" type="text" class="form-control" id="address" value="{{$order->address}}" placeholder="Address" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="delivered">Vận chuyển</label>
                                    <select name="delivered" id="delivered" class="form-control">
                                        <option value="1" {{old('delivered', $order->delivered) == '1' ? 'selected' : ''}}>Đang đóng hộp</option>
                                        <option value="2" {{old('delivered', $order->delivered) == '2' ? 'selected' : ''}}>Đang vận chuyển</option>
                                        <option value="3" {{old('delivered', $order->delivered) == '3' ? 'selected' : ''}}>Giao hàng thành công</option>
                                        <option value="4" {{old('delivered', $order->delivered) == '4' ? 'selected' : ''}}>Giao hàng không thành công</option>
                                    </select>
                                    {{-- <input name="delivered" type="text" class="form-control" id="delivered" value="{{$order->delivered}}" placeholder="Delivered"> --}}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="request">Yêu cầu</label>
                                    <textarea name="request" type="text" class="form-control" id="request" value="{{$order->request}}" rows="5"></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h3 class="card-title">Danh sách sản phẩm</h3>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <tbody><tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Mã sản phẩm</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Đơn giá</th>
                                                            <th>Tổng tiền</th>
                                                        </tr>
                                                        @foreach ($order->orderDetail as $orderDetail)
                                                            <tr style="text-align: center">
                                                                <td>{{ $loop->index }}</td>
                                                                <td>{{ $orderDetail->product_id }}</td>
                                                                <td>{{ $orderDetail->product->name }}</td>
                                                                <td>{{ $orderDetail->quantity }}</td>
                                                                <td>{{ $orderDetail->price }}</td>
                                                                <td>{{ $orderDetail->total_money }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody></table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div><!-- /.container-fluid -->
                        </section>
                        <!--Button -->
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('admin.orders.index') }}">
                                    <button type="button" class="btn  btn-danger">Hủy bỏ</button>
                                </a>
                            </div>
                        </div>
                        <!--End Button -->
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
