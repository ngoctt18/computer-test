@extends('admin.layouts.dashboard')

@section('content')
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa khách hàng</h1>
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
                <form action="{{ route('admin.customers.update', ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @foreach ($errors->all() as $error)
                                        <label class="text text-danger">{{$error}}</label> <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Mã khách hàng</label>
                                    <input type="text" value="{{$customer->code}}" class="form-control" name="code" id="code" placeholder="Mã khách hàng">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="text" value="{{$customer->username}}" class="form-control" name="username" id="username" placeholder="Tên khách hàng" value="{{old('username')}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{$customer->email}}" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                    <div class="form-group" >
                                        <label for="gender">Giới tính</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="male" name="gender" {{old('gender', $customer->gender) == 'male' ? 'checked' : ''}}>
                                        <label class="form-check-label">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="female" name="gender" {{old('gender', $customer->gender) == 'female' ? 'checked' : ''}}>
                                        <label class="form-check-label">Nữ</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" value="{{$customer->birthday}}" name="birthday" class="form-control" id="birthday" placeholder="Ngày sinh">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tên khách hàng</label>
                                    <input type="text" value="{{$customer->name}}" name="name" class="form-control" id="name" placeholder="Họ tên khách hàng">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" value="{{bcrypt($customer->password)}}" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="number" value="{{$customer->phone}}" name="phone" class="form-control" id="phone" placeholder="Số điện thoại">
                                </div>
                                <!-- /.form-group -->
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" value="{{$customer->address}}" name="address" class="form-control" id="address" placeholder="Địa chỉ">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{old('status', $customer->status) == '1' ? 'selected' : ''}}>Đang hoạt động</option>
                                        <option value="2" {{old('status', $customer->status) == '2' ? 'selected' : ''}}>Tạm dừng hoạt động</option>
                                        <option value="3" {{old('status', $customer->status) == '3' ? 'selected' : ''}}>Chưa kích hoạt</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                        <!--Button -->
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('admin.customers.index') }}">
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
