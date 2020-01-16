<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.partials.header')

        <div class="content-wrapper">
           @yield('content')
        </div>

        @include('admin.partials.footer')
    </div>
    @include('admin.partials.scripts')
</body>
</html>
