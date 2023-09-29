<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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

  <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">

  <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">

  <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome4.css') }}">
  <link rel="stylesheet" href="{{asset('css/sweetalert.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/toastr/toastr.css')}}">
  
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
  <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/toastr/toastr.js.map')}}"></script>
  <script src="{{asset('/js/sweetalert.min.js')}}"></script>
  <script src="{{asset('/js/validate.min.js')}}"></script>
  <script src="{{asset('/js/formvalidate.js')}}"></script>
  <script src="{{asset('js/datashow.js')}}"></script>
  <script src="{{asset('js/functions.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  @stack("footer_extras")
</body>

</html>