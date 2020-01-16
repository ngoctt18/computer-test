<!--header bottom satrt-->
<div class="header_bottom sticky-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle">Danh mục sản phẩm</h2>
                    </div>
                    <div class="categories_menu_inner">
                        <ul class=" categorie_sub_menu">
                            @foreach ($catagories as $catagory)
                                <li><a href="{{ route('products.shop.category') }}?name={{$catagory->name}}">{{$catagory->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <ul>
                            <li class="nav-link @if(Route::currentRouteName() == "homepage") {{" active"}} @endif">
                                <a href="{{ route('homepage') }}">Trang chủ <i class="fa"></i></a>
                            </li>
                            <li class="nav-link @if(Route::currentRouteName() == "products.shop") {{" active"}} @endif">
                                <a href="{{ route('products.shop') }}">Sản phẩm<i class="fa"></i></a>
                            </li>
                            <li class="nav-link @if(Route::currentRouteName() == "contacts.contactus") {{" active"}} @endif">
                                <a href="{{ route('contacts.contactus') }}" >Liên hệ</a>
                            </li>
                        </ul>

                    </div>
                    <div class="mobile-menu d-lg-none">
                        <nav>
                            <ul>
                                <li class="nav-link @if(Route::currentRouteName() == "homepage") {{" active"}} @endif">
                                        <a href="{{ route('homepage') }}">Trang chủ <i class="fa"></i></a>
                                    </li>
                                    <li class="nav-link @if(Route::currentRouteName() == "products.shop") {{" active"}} @endif">
                                        <a href="{{ route('products.shop') }}">Sản phẩm<i class="fa"></i></a>
                                    </li>
                                    <li class="nav-link @if(Route::currentRouteName() == "contacts.contactus") {{" active"}} @endif">
                                        <a href="{{ route('contacts.contactus') }}" >Liên hệ</a>
                                    </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="contact_phone">
                    <div class="contact_icone">
                        <span class="pe-7s-headphones"></span>
                    </div>
                    <div class="contact_number">
                        <p>Liên hệ:</p>
                        <span>0987 193 297</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header bottom end-->
