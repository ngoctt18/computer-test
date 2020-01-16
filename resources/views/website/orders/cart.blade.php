@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area commun_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Giỏ hàng</h3>
                    <ul>
                        <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

    <!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">  
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
                @endif
                @if (session()->has('runout'))
                <p class="alert alert-danger">
                    Có sản phẩm 
                    @foreach(session()->get('runout') as $item) {{$item.', '}} @endforeach 
                    không đủ để đáp ứng. Rất xin lỗi mong bạn chọn số lượng khác hoặc lựa chọn sản phẩm khác
                </p>
                @endif
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Xóa</th>
                                    <th class="product_thumb">Mã sản phẩm</th>
                                    <th class="product_name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product_quantity">Số lượng</th>
                                    <th class="product_total1">Tổng tiền</th>
                                </tr>
                            </thead>
                            @foreach(Cart::content() as $item)
                            <tbody>
                                <tr>
                                    <td class="product_remove">
                                        <a class="cart_quantity_delete" href="{{ route('orders.delete-cart', $item->rowId) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td class="product_id">
                                        {{$item->id}}
                                        {{-- <a href="#"><img style="height: 118px; width:118px " src="{{ asset(''.$item->options->image) }}" alt=""></a> --}}
                                    </td>
                                    <td class="product_name"><a href="cart.html#">{{$item->name}}</a></td>
                                    <td class="product-price">{{ number_format($item->price,2 )}}đ</td>
                                    <td class="product_quantity">
                                        <input class="input_quantity" onchange="plusQuantity('{{ route('orders.updateCart', $item->rowId) }}', event)" min="0" max="100" value="{{$item->qty}}" type="number">
                                    </td>
                                    <td class="product_total">{{$item->total()}}đ</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>   
                    </div>  
                    <div class="cart_submit">
                        <button type="" href="#" onclick="updateClick()">Cập nhật giỏ hàng</button>
                        {{-- {{ route('orders.updateCart') }} --}}
                    </div>      
                </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Tổng đơn hàng</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Tổng tiền</p>
                                    <p class="cart_amount">{{Cart::total()}}đ</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('orders.checkout') }}">Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </div>     
    </div>
<!--shopping cart area end -->
@endsection

@section("scripts")
    <script>
        function updateClick(){
            window.location.reload(true);
        }
        function plusQuantity(url, e){
            let elementQuantity = $(e.target);
            let quantity = elementQuantity.val();
            let index = $(".input_quantity").index(elementQuantity[0]);
            $.ajax({
                url: url,
                method: "GET",
                data: {
                    quantity: quantity
                },
                success: function(data){
                    if(data.status){
                        let product = data.cart;
                        $(".product-price").eq(index).text(product.price);
                        $(".product_total").eq(index).text((parseFloat(product.price)* parseFloat(product.qty)).toFixed(2));
                    }
                },
                error: function(err){
                    console.log(err);
                }
            })
        }
    </script>
@endsection