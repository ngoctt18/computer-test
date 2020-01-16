<!--header area start-->
<header class="header_area">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="welcome_text">
                        <p>Chào mừng bạn đến với Computer Store</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">
                        <ul>
                            <li class="top_links">
                                <a href="">
                                    @if (Auth::check())
                                        {{Auth()->user()->name}}
                                    @else
                                        Đăng ký/Đăng nhập
                                    @endif
                                    <i class="ion-chevron-down"></i>
                                </a>
                                <ul class="dropdown_links">
                                    @if (!Auth::check())
                                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                        <li><a href="{{ route('login') }}">Đăng ký</a></li>
                                    @else
                                        <li><a href="{{ route('accounts.myaccount') }}">Tài khoản của tôi </a></li>
                                        <li><a href="{{ route('others.wishlist')}}">Danh sách yêu thích </a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="logo">
                        <a href="{{ route('homepage') }}">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-5">
                    <div class="search_bar">
                        <form action="{{ route('products.shop') }}">
                            <input name="search" placeholder="Nhập từ khóa tìm kiếm ở đây..." type="text" >
                            <button type="submit">
                                <i class="ion-ios-search-strong"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="cart_area">
                        <!-- <div class="wishlist_link">
                            <a href="#"><i class="ion-ios-heart-outline"></i></a>
                        </div> -->
                        <div class="cart_link">
                            <a><i class="ion-ios-cart-outline"></i>Giỏ hàng</a>
                            <span class="cart_count">{{Cart::count()}}</span>
                            <!--mini cart-->
                                <div class="mini_cart">
                                <div class="items_nunber">
                                    <span>{{Cart::count()}} sản phẩm trong giỏ hàng</span>
                                </div>
                                <div class="cart_button checkout">
                                    <a href="{{ route('orders.checkout') }}">Đặt hàng</a>
                                </div>
                                @foreach(Cart::content() as $item)
                                <div class="cart_item">
                                    {{-- <div class="cart_img">
                                        <a><img src="{{ asset(''.$item->options->image) }}" alt=""></a>
                                    </div> --}}
                                    <div class="cart_info">
                                        <a href="#">{{$item->name}}</a>
                                        <form action="#">
                                            <input min="0" max="100" value="{{$item->qty}}" type="number">
                                            <span>{{$item->total()}}đ</span>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <div class="cart_button view_cart">
                                    <a href="{{ route('orders.cart') }}">Xem giỏ hàng và thanh toán</a>
                                </div>
                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    @include('website.partials.menu')
</header>
<!--header area end-->
