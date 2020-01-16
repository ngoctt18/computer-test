<!--custom product start-->
<div class="custom_product">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>Sản phẩm mới</h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @foreach ($recentProducts as $product)
                                @php
                                    $product_decode = json_decode($product->image,true);
                                @endphp
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @if(isset($product_decode))
                                            <a href="{{ route('products.detail', $product)}}">
                                                <img src="{{ asset($product_decode[0]) }}" alt="">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        {{-- <div class="product_ratting">
                                            <ul>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-ios-star-outline"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-ios-star-outline"></i></a></li>
                                            </ul>
                                        </div> --}}
                                        <h3><a href="{{ route('products.detail', $product)}}"> {{$product->name}}</a></h3>
                                        <div class="product_price">
                                            <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>Sản phẩm ngẫu nhiên</h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @foreach ($randomProduct as $product)
                                @php
                                    $product_decode = json_decode($product->image,true);
                                @endphp
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @if (!empty($product_decode) && count($product_decode)> 0)
                                            <img src="{{ asset($product_decode[0]) }}" alt="">
                                        @else
                                            <img src="product" alt="">
                                        @endif
                                    </div>
                                {{-- <div class="single_product">
                                    <div class="product_thumb">
                                        <a href="{{ route('products.detail', $product)}}">
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </a>

                                    </div>  --}}
                                    <div class="product_content">
                                        {{-- <div class="product_ratting">
                                            <ul>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-star"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-ios-star-outline"></i></a></li>
                                                <li><a href="index.html#"><i class="ion-ios-star-outline"></i></a></li>
                                            </ul>
                                        </div> --}}
                                        <h3><a href="{{ route('products.detail', $product)}}"> {{$product->name}}</a></h3>
                                        <div class="product_price">
                                            <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="custom_product_wrapper">
                    <div class="custom_product_title">
                        <h3>Sản phẩm mới về </h3>
                    </div>
                    <div class="custom_product_active owl-carousel">
                        <div class="custom_product_list">
                            @foreach ($featureProduct as $product)
                                @php
                                    $product_decode = json_decode($product->image,true);
                                @endphp
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @if (!empty($product_decode) && count($product_decode)> 0)
                                            <img src="{{ asset($product_decode[0]) }}" alt="">
                                        @else
                                            <img src="product" alt="">
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('products.detail', $product)}}"> {{$product->name}}</a></h3>
                                        <div class="product_price">
                                            <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--custom product end-->
