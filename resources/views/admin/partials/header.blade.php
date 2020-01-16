<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('admin_assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Website bán máy tính</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin_assets/img/user3-128x128.jpg') }}" class="img-circle elevation-2" alt="Ảnh người dùng">
            </div>
            <div class="info">
                @if (Auth::check())
                    <a href="/admin" class="d-block">
                        {{Auth()->user()->name}}
                    </a>
                @endif
                   {{-- / Computer Store</a> --}}
            </div>
        </div>

        <!-- Sidebar Menu -->
    @include('admin.partials.menu')
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
