@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area commun_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Đăng nhập</h3>
                    <ul>
                        <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Đăng nhập</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form login">
                    <h2>Đăng nhập</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <p>   
                            <label>Tên đăng nhâp</label>
                            <input name="username" type="text">
                            @if ($errors->has('username'))
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                            @endif
                            <br/> 
                            <label>Mật khẩu <span>*</span></label>
                            <input name="password" type="password">
                            @if ($errors->has('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif

                        </p>   
                        <div class="login_submit">
                            <button type="submit">login</button>
                            <label for="remember">
                                <input name="remember" type="checkbox">
                                Nhớ mật khẩu
                            </label>
                            <a href="login.html#">Quên mật khẩu?</a>
                        </div>
                    </form>
                    </div>    
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng ký</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <p>   
                            <label>Họ tên  <span>*</span></label>
                            <input name="name" type="text" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </p>
                        <p>   
                            <label>Tên đăng nhập <span>*</span></label>
                            <input name="username" type="text" value="{{old('username')}}">
                            @if ($errors->has('username'))
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                            @endif
                        </p>
                        <p>   
                            <label>Email <span>*</span></label>
                            <input name="email" type="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </p>
                        <p>   
                            <label>Mật khẩu <span>*</span></label>
                            <input name="password" type="password" value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </p>
                        <p>   
                            <label>Ngày sinh  <span></span></label>
                            <input name="birthday" type="date">
                        </p>
                        <p>   
                            <label>Giới tính <span></span></label>
                            <div class="input-radio">
                                <span class="custom-radio">
                                    <input type="radio" name="gender" value="male" {{old('gender') == 'male' ? 'checked' : ''}}>Nam
                                    {{-- <input name="gender" type="radio" value="male" name="id_gender"> Mr. --}}
                                </span>
                                <span class="custom-radio">
                                    <input type="radio" name="gender" value="female" {{old('gender') == 'female' ? 'checked' : ''}}>Nữ
                                    {{-- <input name="gender" type="radio" value="female" name="id_gender"> Mrs. --}}
                                </span>
                            </div> 
                        </p>
                        <p>   
                            <label>Địa chỉ </label>
                            <input name="address" type="text" value="{{old('address')}}">
                         </p>
                        <p>   
                            <label>Số điện thoại <span>*</span></label>
                            <input name="phone" type="text" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>    
            </div>
            <!--register area end-->
        </div>
    </div>    
</div>
<!-- customer login end -->
@endsection