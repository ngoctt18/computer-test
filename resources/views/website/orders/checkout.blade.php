@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>checkout</h3>
                        <ul>
                            <li><a href="{{ route('homepage') }}">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

        <!--Checkout page section-->
    <div class="Checkout_section">
        <div class="container">
            <form action="{{ route('orders.storeCheckout') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="checkout_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            {{-- <form action="checkout.html#"> --}}
                                <h3>Thông tin vận chuyển</h3>
                                <div class="row">
                                        <div class="col-lg-12 mb-20">
                                            <label> Mã khách hàng  <span>*</span></label>
                                            <input type="text" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="user_id" readonly>
                                        </div>
                                    <div class="col-lg-12 mb-20">
                                        <label> Họ tên khách hàng  <span>*</span></label>
                                        <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control" id="name" placeholder="Tên khách hàng">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Địa chỉ  <span>*</span></label>
                                        <input type="text" value="{{Auth::user()->address}}" name="address" class="form-control" id="address" placeholder="Địa chỉ">   
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input type="text" value="{{Auth::user()->phone}}" name="phone" class="form-control" id="" placeholder="Số điện thoại">
                                    </div> 
                                        <div class="col-lg-6 mb-20">
                                        <label> Email <span>*</span></label>
                                        <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" id="email" placeholder="Email">
                                    </div> 
                                    <div class="col-12">
                                        <div class="order-notes">
                                                <label for="request">Ghi chú</label>
                                            <textarea id="request" name="request" placeholder="Để lại ghi chú về đơn hàng nếu khách hàng có nhu cầu. Xin cảm ơn"></textarea>
                                        </div>    
                                    </div>  
                                <input type="hidden" value="{{now()}}" name="date_input" class="form-control" id="date_input">   	    	    	    	    	    	    
                                </div> 
                        </div>
                        <div class="col-lg-6 col-md-6">
                                <h3>Đơn hàng của bạn</h3> 
                                <div class="order_table table-responsive mb-30">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        @foreach(Cart::content() as $item)
                                            <tbody>
                                                <tr>
                                                    <td> {{$item->name}} <strong> × {{$item->qty}}</strong></td>
                                                    <td> {{$item->total()}}đ</td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <tfoot>
                                            <tr class="order_total">
                                                <th>Tổng tiền đơn hàng</th>
                                                <td><strong>{{Cart::total()}}đ</strong></td>
                                                <input type="hidden" value="{{Cart::total('0','','')}}" name="total_money" class="form-control" id="total_money">
                                            </tr>
                                        </tfoot>
                                    </table>     
                                </div>
                                <div class="payment_method">
                                    <div class="order_button">
                                        <button  type="submit">Đặt hàng</button> 
                                    </div>    
                                </div>       
                        </div>
                    </div> 
                </div> 
            </form>
        </div>       
    </div>
    <!--Checkout page section end-->
@endsection