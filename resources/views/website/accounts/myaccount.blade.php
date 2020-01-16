@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area commun_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Tài khoản của tôi</h3>
                    <ul>
                        <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Tài khoản của tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

    <!-- my account start  -->
<section class="main_content_area">
    <div class="container">   
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li> <a href="my-account.html#orders" data-toggle="tab" class="nav-link active" data-index="0">Đơn hàng</a></li>
                            <li><a href="my-account.html#account-details" data-toggle="tab" class="nav-link" data-index="1">Thông tin tài khoản</a></li>
                            <li><a href="{{ route('logout')}}" class="nav-link">Đăng xuất</a></li>
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active" id="orders">
                            <h3>Đơn hàng</h3>
                            <div class="coron_table table-responsive active">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Tùy chọn</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->date_input}}</td>
                                                <td>
                                                    @if($item->status == '1')
                                                        {{"Đang chờ xử lý"}}
                                                    @elseif($item->status == '2')
                                                        {{"Đang giao hàng"}}
                                                    @elseif($item->status == '3')
                                                        {{"Giao hàng thành công"}}
                                                    @elseif($item->status == '4')
                                                        {{"Giao hàng thất bại"}}
                                                    @endif 
                                                </td>
                                                <td>{{number_format($item->total_money,0)}} </td>
                                                <td><a href="cart.html" class="view">Xem chi tiết</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Thông tin tài khoản </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form ">
                                        <!-- <div class="input-radio">
                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                        </div> <br>"> -->
                                        <form action="{{ route('updateaccount', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf 
                                            @method('PUT')
                                            @foreach ($errors->all() as $error)
                                                <label class="text text-danger">{{$error}}</label> <br>
                                            @endforeach
                                            <label for="name">Họ tên</label>
                                            <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control" id="name" placeholder="Họ tên">
                                            <label for="username">Tên đăng nhập</label>
                                            <input type="text" value="{{Auth::user()->username}}" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{old('username')}}">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" id="email" placeholder="Email">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="number" value="{{Auth::user()->phone}}" name="phone" class="form-control" id="phone" placeholder="Số điện thoại">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" value="{{Auth::user()->password}}" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                                            <label for="birthday">Ngày sinh</label>
                                            <input type="date" value="{{Auth::user()->birthday}}" name="birthday" class="form-control" id="birthday" placeholder="Ngày sinh">
                                            <label>Giới tính</label>
                                            <div class="input-radio">
                                                <span class="custom-radio">
                                                    <input type="radio" value="male" name="gender" {{old('gender', Auth::user()->gender) == 'male' ? 'checked' : ''}}> Nam.
                                                </span>
                                                <span class="custom-radio">
                                                    <input type="radio" value="female" name="gender" {{old('gender', Auth::user()->gender) == 'female' ? 'checked' : ''}}> Nữ.
                                                </span>
                                                
                                            </div> 
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" value="{{Auth::user()->address}}" name="address" class="form-control" id="address" placeholder="Địa chỉ">
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>        	
</section>			
<!-- my account end   --> 

@endsection
@push('scripts')
<script>
    $(".nav-link").click(function(e){
        var index = $(e.currentTarget).data("index");
        $(".tab-pane").removeClass("active show");
        $(".tab-pane").eq(index).addClass("active show");
    });
</script>
@endpush