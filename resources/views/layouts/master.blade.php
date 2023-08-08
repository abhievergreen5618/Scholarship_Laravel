<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminltenew.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack("header_extras")
</head>

<body class="hold-transition sidebar-mini">

    @include('layouts.partials.admin.header')
    @include('layouts.partials.admin.sidebar')
    <div class="content-wrapper" style="min-height: 214px;">
        <div class="container-fluid">
            @include('layouts.partials.alert')
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.admin.footer')
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/datashow.js')}}"></script>

    @stack("footer_extras")
</body>

</html>
