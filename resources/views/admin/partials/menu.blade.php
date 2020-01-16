<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->   
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.dashboard") {{"menu-open"}} @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::currentRouteName() == "admin.dashboard") {{" active"}} @endif">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        Dashboard
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
            </li>
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.products.index" || Route::currentRouteName() == "admin.products.create") {{"menu-open"}} @endif">
            <a href="#" class="nav-link  @if(Route::currentRouteName() == "admin.products.index" || Route::currentRouteName() == "admin.products.create") {{" active"}} @endif">
                <i class="nav-icon fa fas fa-shopping-basket"></i>
                <p>
                    Quản lý sản phẩm
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview @if(Route::currentRouteName() == "admin.products.index") {{"menu-open"}} @endif">
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.products.index") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.create') }}" class="nav-link @if(Route::currentRouteName() == "admin.products.create") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.brands.index" || Route::currentRouteName() == "admin.brands.create") {{" menu-open"}} @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == "admin.brands.index" || Route::currentRouteName() == "admin.brands.create") {{" active"}} @endif">
                <i class="nav-icon fa fas fa-table"></i>
                <p>
                    Quản lý hãng
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview @if(Route::currentRouteName() == "admin.brands.index") {{" active"}} @endif">
                <li class="nav-item">
                    <a href="{{ route('admin.brands.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.brands.index") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Danh sách hãng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.brands.create') }}" class="nav-link @if(Route::currentRouteName() == "admin.brands.create") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Thêm hãng</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.orders.index") {{" menu-open"}} @endif">
            <a href="{{ route('admin.orders.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.orders.index") {{" active"}} @endif">
                <i class="nav-icon fa fas fa-shopping-cart"></i>
                <p>
                    Quản lý đơn hàng
                    <i class="right fa"></i>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.catagories.index" || Route::currentRouteName() == "admin.catagories.create") {{" menu-open"}} @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == "admin.catagories.index" || Route::currentRouteName() == "admin.catagories.create") {{" active"}} @endif">
                <i class="nav-icon fa fas fa-book"></i>
                <p>
                    Quản lý danh mục
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.catagories.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.catagories.index") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.catagories.create') }}" class="nav-link @if(Route::currentRouteName() == "admin.catagories.create") {{" active"}} @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @if(Route::currentRouteName() == "admin.customers.index" || Route::currentRouteName() == "admin.employees.index" || Route::currentRouteName() == "admin.employees.create") {{" menu-open"}} @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == "admin.customers.index" || Route::currentRouteName() == "admin.employees.index" || Route::currentRouteName() == "admin.employees.create") {{" active"}} @endif">
                <i class="nav-icon fa fas fa-users"></i>
                <p>
                    Quản lý tài khoản
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.customers.index") {{" active"}} @endif"">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Danh sách khách hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.employees.index') }}" class="nav-link @if(Route::currentRouteName() == "admin.employees.index") {{" active"}} @endif"">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Danh sách nhân viên</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.employees.create') }}" class="nav-link @if(Route::currentRouteName() == "admin.employees.create") {{" active"}} @endif"">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">MACHINE LEARNING</li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Algorithm
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.kmean.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>K-mean</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.apriori.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Apriori</p>
                </a>
              </li>
            </ul>
          </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
