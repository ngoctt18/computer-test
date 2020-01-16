@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area commun_bread">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>wishlist</h3>
                    <ul>
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!--wishlist area start -->
<div class="wishlist_area">
    <div class="container">   
        <form action="wishlist.html#"> 
            <div class="row">
                <div class="col-12">
                    <div class="table_desc wishlist">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_id">Code</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_total">Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product_remove"><a href="wishlist.html#">X</a></td>
                                        <td class="product_id"><a href="wishlist.html#">Handbag fringilla</a></td>
                                        <td class="product_thumb"><a href="wishlist.html#"><img src="assets/img/cart/cart6.jpg" alt=""></a></td>
                                        <td class="product_name"><a href="wishlist.html#">Handbag fringilla</a></td>
                                        <td class="product-price">£65.00</td>
                                        <td class="product_total"><a href="wishlist.html#">Add To Cart</a></td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>  

                    </div>
                    </div>
                </div>

        </form> 
    </div>
</div>
    <!--wishlist area end -->
@endsection