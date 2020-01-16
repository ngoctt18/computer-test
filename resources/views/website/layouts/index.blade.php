@extends('website.layouts.master')

@section('content')

    <!--slider area start-->
    <div class="slider_area owl-carousel">
        <div class="single_slider slider_one">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>Sinh nhật <br><strong>Sale chất</strong></h1>
                            <h3>Giảm giá tới</h3>
                            <h2>30% </h2>
                            <p>Nâng cấp 12 tháng 1 lần</p>
                            <a href="{{ route('products.shop') }}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider slider_two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1><strong>Xuân rộn ràng</strong><br> hàng ngàn quà tặng </h1>
                            <h3>Giảm giá tới</h3>
                            <h2>40%</h2>
                            <p></p>
                            <a href="{{ route('products.shop') }}">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="shipping_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-piggy"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Cam kết</h3>
                                <p>Giá tốt nhất</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-rocket"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Miễn phí</h3>
                                <p>Vận chuyển</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-help2"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Bảo hành</h3>
                                <p>Tại nơi sử dụng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="single_shipping column_3">
                            <div class="shipping_icone">
                                <span class="pe-7s-credit"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Thanh toán</h3>
                                <p>Khi nhận hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!--shipping area end-->

    <!--product area start-->
    @include('website.home.productarea')
    <!--product area end-->
    
    <!--consoles product start-->
    @include('website.home.consoleproduct')
    <!--consoles product end-->

        <!-- modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">  
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                <div class="modal_tab_img" >
                                                    <a href="">
                                                        <img  id="img-modal" src="assets/img/product/product44.jpg" alt="">
                                                    </a>    
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="modal_tab_button">    
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li >
                                                    <a class="nav-link active" data-toggle="tab" href="index.html#tab1" role="tab" aria-controls="tab1" aria-selected="false">
                                                        <img src="assets/img/cart/cart5.jpg" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>     --}}
                                    </div>  
                                </div> 
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>Handbag feugiat</h2> 
                                        </div>
                                        <div class="modal_price mb-10">
                                            <span class="old_price">$64.99</span>    
                                            <span class="new_price" >$78.99</span>    
                                        </div>
                                        <div class="modal_warranty mb-10">
                                            <h2>Bảo hành tháng)(</h2>
                                            <p>2 years.</p>   
                                        </div>
                                        <div class="modal_description mb-15">
                                            <h2>Thông tin sản phẩm</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                        </div> 
                                    </div>    
                                </div>    
                            </div>     
                        </div>
                    </div>    
                </div>
            </div>
        </div> 
        <!-- modal area start-->
        <!--custom product start-->
    @include('website.home.customproduct')
    <!--custom product end-->
@endsection
@push('scripts')
<script>
    
    // $(".nav-link2").click(function(e){
    //     var index = $(e.currentTarget).data("index");
    //     $("#tab-content2 .tab-pane").removeClass("active show");
    //     $("#tab-content2 .tab-pane").eq(index).addClass("active show");
    // });

    $("#modal_box").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var data = button.data('data')
        console.log(data);

        $("#img-modal").attr('src',JSON.parse(data.image)[0]); 
        $(".modal_title h2").text(data.name);
        $(".new_price").text(data.price_new);
        $(".old_price").text(data.price);
        $(".modal_warranty p").text(data.warranty);
        $(".modal_description p").text(data.detail);
    });
</script>
@endpush