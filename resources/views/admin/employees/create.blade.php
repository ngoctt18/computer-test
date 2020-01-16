@extends('admin.layouts.dashboard')

@section('content')
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm nhân viên</h1>
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
                    <h3 class="card-title">Thêm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!--Main form-->
                    <!--Main form-->
                    <form action="{{ route('admin.employees.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @foreach ($errors->all() as $error)
                                    <label class="text text-danger">{{$error}}</label> <br>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="">Mã nhân viên</label>
                                    <input type="text" class="form-control" name="code" value="{{old('code')}}" id="code" placeholder="Mã nhân viên">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{old('username')}}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Email">
                                </div>
                                    <div class="form-group" >
                                        <label for="gender">Giới tính</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="male" {{old('gender') == 'male' ? 'checked' : ''}}>
                                        <label class="form-check-label">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="female" {{old('gender') == 'female' ? 'checked' : ''}}>
                                        <label class="form-check-label">Nữ</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" value="{{old('birthday')}}" id="birthday" placeholder="Ngày sinh">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Họ tên</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Họ tên">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="number" name="phone" class="form-control" value="{{old('phone')}}" id="phone" placeholder="Số điện thoại">
                                </div>
                                <!-- /.form-group -->
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}" id="address" placeholder="Địa chỉ">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{old('status') == '1' ? 'selected' : ''}}>Đang hoạt động</option>
                                        <option value="2" {{old('status') == '2' ? 'selected' : ''}}>Tạm dừng hoạt động</option>
                                        <option value="3" {{old('status') == '3' ? 'selected' : ''}}>Chưa kích hoạt</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!--Button -->
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('admin.employees.index') }}">
                                    <button type="button" class="btn  btn-danger">Hủy bỏ</button>
                                </a>
                            </div>
                        </div>
                        <!--End Button -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
