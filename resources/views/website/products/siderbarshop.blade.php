<!--shop wrapper start-->
<div class="shop_wrapper shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="sidebar_widget">
                                       
                    <!--manufacturer start-->
                    <div class="widget_list manufacturer">
                        <h3>Hãng</h3>
                        <ul>
                            @foreach ($brands as $brand)
                                <li>
                                    <a href="{{ route('products.shop.brand')}}?name={{$brand->name}}">{{$brand->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--manufacturer start-->
                    
                    <!--widget  price start-->
                    {{-- <div class="widget_list price">
                        <h3>Giá</h3>
                        <ul>
                            <li><a href="shop.html#">0.00 - 10 triệu </a></li>

                            <li><a href="shop.html#">trên 10 triệu </a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop toolbar start-->
                <div class="shop_toolbar">
                    @if (@isset($search))
                        <p color="blue">Đã tìm kiếm theo từ khóa: {{$search}}</p>
                    @endif
                    <div class="list_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true">
                                    <i class="ion-grid"></i>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="ion-android-menu"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                    <!--shop tab product-->
                <div class="shop_tab_product">   
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="large" role="tabpanel">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6">
                                        @php
                                            $product_decode = json_decode($product->image,true);
                                        @endphp
                                        <div class="single_product"> 
                                            <div class="product_thumb">
                                                    {{-- @foreach ($productFeature as $product)
                                                    
                                                <div class="col-lg-3">
                                                    <div class="single_product"> 
                                                        <div class="product_thumb">
                                                            --}}
                                                @if (count($product_decode)> 0)
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
                                                    <span class="current_price">{{number_format($product->price,2)}} đ</span>
                                                </div>
                                                <div class="product_action">
                                                    <ul>
                                                        <li class="product_cart"><a href="{{ route('products.detail', $product)}}" title="Chi tiết">Chi tiết</a></li>
                                                        <li class="add_links"><a href="shop.html#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                                        <li class="add_links"><a href="shop.html#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                @endforeach
                            </div>     
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel">
                            @foreach ($products as $product)
                                @php
                                    $product_decode = json_decode($product->image,true);
                                @endphp
                                <div class="single_product list_item">
                                    <div class="row align-items-center">   
                                        <div class="col-lg-4 col-md-5">
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
                                        </div>
                                        <div class="col-lg-8 col-md-7">
                                            <div class="product_content">   
                                                <h3><a href="{{ route('products.detail', $product)}}">{{$product->name}}</a></h3>
                                                <div class="product_price">
                                                    <span class="current_price">{{number_format($product->price,2)}}đ</span>
                                                </div>
                                                <div class="product_description">
                                                    <p>{{$product->detail}}	</p>
                                                </div>
                                                <div class="product_action">
                                                    <ul>
                                                        <li class="product_cart"><a href="{{ route('products.detail', $product)}}" title="Chi tiết">Chi tiết</a></li>
                                                        <li class="add_links"><a href="shop.html#" title="Add to Wishlist"><i class="ion-ios-heart-outline"></i></a></li>
                                                        <li class="add_links"><a href="shop.html#" title="Add to Compare"><i class="ion-loop"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            @endforeach                   
                        </div>
                    </div>
                </div>    
                <!--shop tab product end-->
                
                <!--pagination style start--> 
                <div class="pagination_style">
                    {{ $products->links() }}    
                </div>
                <!--pagination style end--> 
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $("#modal_box").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var data = button.data('data')
        console.log(data);

        $("#img-modal").attr('src',JSON.parse(data.image)[0]); 
        $(".modal_title h2").text(data.name);
        $(".new_price").text((data.price_new));
        $(".old_price").text((data.price));
        $(".modal_rom p").text(data.rom);
        $(".modal_ram p").text(data.ram);
        $(".modal_screensize p").text(data.screen_size);
        $(".modal_warranty p").text(data.warranty);
        $(".modal_content p").text(data.view);
        $(".modal_description p").text(data.detail);
    });
</script>
@endpush