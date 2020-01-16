@extends('website.layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Liên hệ với chúng tôi</h3>
                        <ul>
                            <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Liên hệ với chúng tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact_message content">
                        <h3>Liên hệ với chúng tôi</h3>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Địa chỉ: An Thach, Kien Thiet, Tien Lang, Hai Phong</li>
                            <li><i class="fa fa-phone"></i> <a href="contact.html#">admin@gmail.com.com</a></li>
                            <li><i class="fa fa-envelope-o"></i> 0987 193 297</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
