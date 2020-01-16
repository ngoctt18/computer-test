<!--consoles product start-->
    <div class="consoles_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consoles_header">
                        <div class="consoles_product_title">
                            <h3>Máy tính và phụ kiện </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="index.html#"><img src="assets/img/banner/banner9.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="tab-content" id="tab-content2">
                        <div class="tab-pane fade show active" id="Gamepads" role="tabpanel">
                            <div class="row">
                                <div class="consoles_product_active owl-carousel">
                                    @foreach ($productFeature as $product)
                                        @php
                                            $product_decode = json_decode($product->image,true);
                                        @endphp
                                        <div class="col-lg-3">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    @if(isset($product_decode))
                                                        @foreach($product_decode as $pd)
                                                            <a href="{{ route('products.detail', $product)}}">
                                                                <img src="{{ asset($pd) }}" alt="">
                                                            </a>
                                                            @break
                                                        @endforeach
                                                    @endif
                                                    <div class="btn_quickview">
                                                        <a href="#" data-data='{{$product->toJson()}}' data-toggle="modal" data-target="#modal_box"  title="Quick View">
                                                            <i class="ion-ios-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <h3><a href="{{ route('products.detail', $product)}}">{{ $product->name }}</a></h3>
                                                    <div class="product_price">
                                                        <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                                    </div>
                                                    <div class="product_action">
                                                        <ul>
                                                            <li class="product_cart"><a href="{{ route('products.detail', $product)}}" title="Chi tiết">Chi tiết</a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Control" role="tabpanel">
                            <div class="row">
                                <div class="consoles_product_active owl-carousel">
                                    @foreach ($productFeature as $product)
                                        @php
                                            $product_decode = json_decode($product->image,true);
                                        @endphp
                                        <div class="col-lg-3">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    @if (!empty($product_decode) && count($product_decode)> 0)
                                                        <img src="{{ asset($product_decode[0]) }}" alt="">
                                                    @else
                                                        <img src="product" alt="">
                                                    @endif
                                                    <div class="btn_quickview">
                                                        <a href="#" data-data='{{$product->toJson()}}' data-toggle="modal" data-target="#modal_box"  title="Quick View">
                                                            <i class="ion-ios-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                                    <div class="product_price">
                                                        <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                                    </div>
                                                    <div class="product_action">
                                                        <ul>
                                                            <li class="product_cart"><a href="{{ route('products.detail', $product)}}"" title="Chi tiết">Chi tiết</a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Game" role="tabpanel">
                            <div class="row">
                                <div class="consoles_product_active owl-carousel">
                                    @foreach ($productFeature as $product)
                                        @php
                                            $product_decode = json_decode($product->image,true);
                                        @endphp
                                        <div class="col-lg-3">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    @if (!empty($product_decode) && count($product_decode)> 0)
                                                        <img src="{{ asset($product_decode[0]) }}" alt="">
                                                    @else
                                                        <img src="product" alt="">
                                                    @endif
                                                    <div class="btn_quickview">
                                                        <a href="#" data-data='{{$product->toJson()}}' data-toggle="modal" data-target="#modal_box"  title="Quick View">
                                                            <i class="ion-ios-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                                    <div class="product_price">
                                                        <span class="current_price">{{number_format($product->price,0)}}đ</span>
                                                    </div>
                                                    <div class="product_action">
                                                        <ul>
                                                            <li class="product_cart"><a href="{{ route('products.detail', $product)}}"" title="Chi tiết">Chi tiết</a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                                            <li class="add_links"><a href="index.html#" title="Add to Compare"><i class="ion-loop"></i></a></li>
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
            </div>
        </div>
    </div>
<!--consoles product end-->
@push('scripts')
<script>

    $(".nav-link2").click(function(e){
        var index = $(e.currentTarget).data("index");
        $("#tab-content2 .tab-pane").removeClass("active show");
        $("#tab-content2 .tab-pane").eq(index).addClass("active show");
    });

    // $("#modal_box").on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var data = button.data('data')
    //     console.log(JSON.parse(data.image)[0]);

    //     $("#img-modal").attr('src',JSON.parse(data.image)[0]);
    //     $(".modal_title h2").text(data.name);
    //     $(".new_price").text((data.price_new));
    //     $(".old_price").text((data.price));
    //     $(".modal_content p").text(data.view);
    //     $(".modal_description p").text(data.detail);
    // });
</script>
@endpush
