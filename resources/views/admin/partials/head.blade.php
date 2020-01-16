<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/adminlte.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/font-awesome/font-awesome.min.css') }}">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/style.css') }}">

@stack('styles')
@yield('styles')

<title>@yield('title', 'Computer Store')</title>
