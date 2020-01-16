@extends('website.layouts.master')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="breadcrumbs_inner">  
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Sản phẩm</h3>
                        <ul>
                            <li><a href="{{ route('homepage') }}">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!--shop wrapper start-->
@include('website.products.siderbarshop')

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
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2> 
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>    
                                        <span class="old_price" >$78.99</span>    
                                    </div>
                                    <div class="modal_warranty mb-10">
                                        <h2>Bảo hành</h2>
                                        <p>2 years.</p>   
                                    </div>
                                    <div class="modal_description mb-15">
                                        <h2>Mô tả sản phẩm</h2>
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

@endsection

@push('scripts')
<script>
    $("#modal_box").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var data = button.data('data')
        console.log(data);

        $("#img-modal").attr('src',JSON.parse(data.image)[0]); 
        $(".modal_title h2").text(data.name);
        $(".new_price").text((data.price_new).toFixed(2));
        $(".old_price").text((data.price).toFixed(2));
        $(".modal_warranty p").text(data.warranty);
        $(".modal_description p").text(data.detail);
    });
</script>
@endpush