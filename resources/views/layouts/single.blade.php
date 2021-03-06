<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   <!--  <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- icon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('public/img/favicon.png') }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link href="{{ asset('public/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" type="text/css">
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('public/demo/demo.css') }}" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}

</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
          
        </main>
       
    </div>

  <!--   Core JS Files   -->
  
  <script src="{{ asset('public/js/core/jquery.min.js') }} " type="text/javascript"></script>
  <script src="{{ asset('public/js/core/popper.min.js') }} " type="text/javascript"></script>
  
  <script src="{{ asset('public/js/core/bootstrap-material-design.min.js') }} " type="text/javascript"></script>
  <script src="{{ asset('public/js/plugins/perfect-scrollbar.jquery.min.js') }} " type="text/javascript"></script>

  <!-- Chartist JS -->
  <script src="{{ asset('public/js/plugins/chartist.min.js') }} " type="text/javascript"></script>
  
  <!--  Notifications Plugin  -->  
  <script src="{{ asset('public/js/plugins/bootstrap-notify.js') }} " type="text/javascript"></script>
  
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('public/js/material-dashboard.min.js?v=2.1.0') }} " type="text/javascript"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('public/demo/demo.js') }} " type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script>
    /*   $('#errorAlert').hide(4000).slideUp(400); */
  </script>
 
</body>
</html>
