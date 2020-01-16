<!DOCTYPE html>
<html lang="en">
<head>
    @include('website.partials.head')
</head>
<body>
    <div class="wrapper">
        @include('website.partials.header')

        <div class="content-wrapper">
           @yield('content')
        </div>

        @include('website.partials.footer')
    </div>
    @include('website.partials.scripts')
</body>
</html>
