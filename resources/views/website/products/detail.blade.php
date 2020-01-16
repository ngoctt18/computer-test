@extends('website.layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="breadcrumbs_inner">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <h3>Chi tiết sản phẩm</h3>
                            <ul>
                                <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>Chi tiết sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    @php
    $images_pr = json_decode($product->image,true);
    @endphp
    <!--single product wrapper start-->
    <div class="single_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="product_gallery">
                        <div class="tab-content produc_thumb_conatainer">
                            @if(!empty($images_pr))
                            @foreach ($images_pr as $item)
                                <div class="tab-pane fade show active" id="p_tab1" role="tabpanel" >

                                    <div class="modal_img">
                                        <a href="{{ route('products.detail', $product)}}#">
                                            <img src="{{asset($item)}}" alt="" height="300px">
                                            {{-- <img src="public/uploads/products/{{$product->image}}" alt="single-product-image" /> --}}
                                        </a>
                                    </div>
                                </div>
                                @break
                            @endforeach

                            @foreach ($images_pr as $key => $items)
                                <div class="tab-pane fade" id="p_tab{{(($loop->index)+1)}}" role="tabpanel">
                                    <div class="modal_img" height="470px">
                                        <a href="{{ route('products.detail', $product)}}#"><img src="{{asset($items)}}" alt=""></a>
                                    </div>
                                </div>

                            @endforeach
                            @endif
                        </div>
                        <div class="product_thumb_button">
                            <ul class="nav product_d_button" role="tablist">
                                @if(!empty($images_pr))
                                @foreach ($images_pr as $item)
                                    <li >
                                        <a class="active" data-toggle="tab" href="{{ route('products.detail', $product)}}#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false">
                                            <img src="{{asset($item)}}">
                                        </a>
                                    </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="product_details">
                        <h3>{{$product->name}}</h3>
                        <div class="product_price">
                            <span class="current_price">{{number_format($product->price,0)}} đ</span>
                            <span class="old_price">{{number_format($product->price_new,0)}} đ</span>
                        </div>
                        <div class="product_ratting">
                            <ul>
                                <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                <li><a href="product-details.html#"><i class="ion-ios-star-outline"></i></a></li>
                            </ul>
                            <ul>
                                <li><a href="product-details.html#">Đánh giá</a></li>
                            </ul>
                        </div>
                        <div class="product_description">
                            <p>{{$product->detail}}</p>
                        </div>
                        <form action="{{ route('orders.addToCart', ['id'=>$product->id]) }}" method="POST">
                            @csrf
                            <div class="product_details_action">
                                <h3>Tùy chọn có sẵn</h3>
                                <div class="product_stock">
                                    <label>Số lượng</label>
                                    <input value="1" min="1" max="100" type="number" name="qty" required>
                                </div>
                                <div class="product_action_link">
                                    <ul>
                                        <li class="product_cart"><button type="submit" title="Add to Cart">Đặt hàng</button></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--single product wrapper end-->
    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav dashboard-list" id="myTab" role="tablist">
                                <li >
                                    <a class="nav-link active" data-toggle="tab" href="product-details.html#info" role="tab" aria-controls="info" aria-selected="false" data-index="0">Thông tin mô tả</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="product-details.html#sheet" role="tab" aria-controls="sheet" aria-selected="false" data-index="1">Thông tin sản phẩm</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="product-details.html#reviews" role="tab" aria-controls="reviews" aria-selected="false" data-index="2">Đánh giá</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>{{$product->detail}}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="sheet" role="tabpanel" >
                                <div class="product_d_table">
                                    <form action="product-details.html#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Mã sản phẩm</td>
                                                    <td>{{$product->code}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Tên</td>
                                                    <td>{{$product->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Giá</td>
                                                    <td>{{number_format($product->price,0)}}đ</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Giá mới</td>
                                                    <td>{{number_format($product->price_new,0)}}đ</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Tính năng</td>
                                                    <td>
                                                        {{$product->feature}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Công dụng</td>
                                                    <td>
                                                        {{$product->use}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Hãng sản phẩm</td>
                                                    <td>
                                                        {{$product->brand->name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Màu của sản phẩm</td>
                                                    <td>{{$product->color}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Danh mục</td>
                                                    <td>{{$product->catagory->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Năm sản xuất</td>
                                                    <td>{{$product->year}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>{{$product->detail}}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="reviews" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                                <div class="product_info_inner">
                                    <div class="product_ratting mb-10">
                                        <ul>
                                            <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                            <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                            <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                            <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                            <li><a href="product-details.html#"><i class="ion-star"></i></a></li>
                                        </ul>
                                        <strong>Posthemes</strong>
                                        <p>09/07/2018</p>
                                    </div>
                                    <div class="product_demo">
                                        <strong>demo</strong>
                                        <p>That's OK!</p>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <form action="product-details.html#">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment" ></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author"  type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email"  type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <div class="produtc_area related_Product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consoles_product_title">
                        <h3>Sản phẩm nên mua cùng</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_active_cung_loai owl-carousel">
                    @foreach ($recommands as $product)
                        @php
                            $product_decode = json_decode($product->image,true);
                        @endphp
                        <div class="col-lg-12">
                            <div class="single_product">
                                <div class="product_thumb">
                                    @if (!empty($product_decode) && count($product_decode)> 0)
                                        <img src="{{ asset($product_decode[0]) }}" alt="">
                                    @else
                                        <img src="product" alt="">
                                    @endif
                                        {{-- <a href="{{ route('products.detail', $product)}}"><img src="{{asset($product->image)}}" alt=""></a> --}}
                                    <div class="btn_quickview">
                                        <a href="{{ route('products.detail', $product)}}#" data-toggle="modal" data-target="#modal_box"  title="Quick View"><i class="ion-ios-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                    <div class="product_price">
                                        <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                    </div>
                                    <div class="product_action">
                                        <ul>
                                            <li class="product_cart"><a href="{{ route('products.detail', $product)}}#" title="Add to Cart">Add to Cart</a></li>
                                            <li class="add_links"><a href="{{ route('products.detail', $product)}}#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                            <li class="add_links"><a href="{{ route('products.detail', $product)}}#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->
    <!--product area start-->
    <div class="produtc_area upsell_Products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consoles_product_title">
                        <h3>Sản phẩm tương tự</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_active_cung_loai owl-carousel">
                    @foreach ($array_product as $kmeanpr)
                        @php
                            $product_decode = json_decode($kmeanpr->image,true);
                        @endphp
                        <div class="col-lg-12">
                            <div class="single_product">
                                <div class="product_thumb">
                                    @if (!empty($product_decode) && count($product_decode)> 0)
                                        <img src="{{ asset($product_decode[0]) }}" alt="">
                                    @else
                                        <img src="product" alt="">
                                    @endif
                                    <div class="btn_quickview">
                                        <a href="{{ route('products.detail', $kmeanpr)}}#" data-toggle="modal" data-target="#modal_box"  title="Quick View"><i class="ion-ios-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="{{ route('products.detail', $kmeanpr)}}">{{$kmeanpr->name}}</a></h3>
                                    <div class="product_price">
                                        <span class="current_price">{{number_format($kmeanpr->price,0)}} đ</span>
                                    </div>
                                    <div class="product_action">
                                        <ul>
                                            <li class="product_cart"><a href="{{ route('products.detail', $kmeanpr)}}#" title="Add to Cart">Add to Cart</a></li>
                                            <li class="add_links"><a href="{{ route('products.detail', $kmeanpr)}}#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                            <li class="add_links"><a href="{{ route('products.detail', $kmeanpr)}}#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--product area end-->
@endsection
@push('scripts')
<script>
    $(".nav-link").click(function(e){
        var index = $(e.currentTarget).attr("data-index");
        $(".product_d_info .tab-pane").removeClass("active show");
        $(".product_d_info .tab-pane").eq(index).addClass("active show");
    });
</script>
@endpush
