<!--product area start-->
<div class="produtc_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="nav-link1 active" data-toggle="tab" href="#" role="tab" aria-controls="Products" data-index="0"> Sản phẩm</a>
                        </li>
                        <li>
                            <a class="nav-link1" data-toggle="tab" href="#" role="tab" aria-controls="OnSale" data-index="1"> Đang Sale</a>
                        </li>
                        <li>
                            <a class="nav-link1" data-toggle="tab" href="#" role="tab" aria-controls="Feature" data-index="2"> Sản phẩm sắp về</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="tab-content1">
            <div class="tab-pane fade active" id="Products" role="tabpanel">
                <div class="row">
                    <div class="product_active owl-carousel">
                        @foreach ($newProduct as $product)
                            @php
                                $product_decode = json_decode($product->image,true);
                            @endphp
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @if(isset($product_decode))
                                            <a href="{{ route('products.detail', $product)}}">
                                                @if (!empty($product_decode) && count($product_decode) > 0)
                                                    <img src="{{ asset($product_decode[0]) }}" alt="">
                                                @else
                                                    <img src="product" alt="">
                                                @endif
                                            </a>
                                        @endif
                                        <div class="btn_quickview">
                                            <a href="#" data-data='{{$product->toJson()}}' data-toggle="modal" data-target="#modal_box"  title="Quick View">
                                                <i class="ion-ios-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                        {{-- <span><a href="#">({{$product->color}})</a></span> --}}
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
            <div class="tab-pane fade" id="OnSale" role="tabpanel">
                <div class="row">
                    <div class="product_active owl-carousel">
                        @foreach ($productSale as $product)
                            @php
                                $product_decode = json_decode($product->image,true);
                            @endphp
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @if(isset($product_decode))
                                            <a href="{{ route('products.detail', $product)}}">
                                                @if (!empty($product_decode) && count($product_decode)> 0)
                                                    <img src="{{ asset($product_decode[0]) }}" alt="">
                                                @else
                                                    <img src="product" alt="">
                                                @endif
                                            </a>
                                        @endif
                                        <div class="btn_quickview">
                                            <a href="#" data-data='{{$product->toJson()}}' data-toggle="modal" data-target="#modal_box"  title="Quick View">
                                                <i class="ion-ios-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                        {{-- <span><a href="#">({{$product->color}})</a></span> --}}
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
            <div class="tab-pane fade" id="Feature" role="tabpanel">
                <div class="row">
                    <div class="product_active owl-carousel">
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
                                        {{-- <span><a href="#">({{$product->brand->name}}-{{$product->color}})</a></span> --}}
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
<!--product area end-->
@push('scripts')
<script>
    $(".nav-link1").click(function(e){
        var index = $(e.currentTarget).data("index");
        $("#tab-content1 .tab-pane").removeClass("active show");
        $("#tab-content1 .tab-pane").eq(index).addClass("active show");
    });

    // $("#modal_box").on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var data = button.data('data')
    //     console.log('thu ngu');
    //     $("#img-modal").attr('src',JSON.parse(data.image)[0]);
    //     $(".modal_title h2").text(data.name);
    //     $(".new_price").text((data.price_new));
    //     $(".old_price").text((data.price));
    //     $(".modal_content p").text(data.view);
    //     $(".modal_description p").text(data.detail);
    // });
</script>
@endpush
