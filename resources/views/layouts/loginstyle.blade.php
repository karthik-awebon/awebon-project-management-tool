<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- icon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" type="text/css">
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" type="text/css">

</head>
<body>


    <div id="app">
        
        <main class="">
            @yield('content')
        </main>
    </div>



  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }} " type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }} " type="text/javascript"></script>
  
 <!--  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script> -->
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }} " type="text/javascript"></script>

  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/chartist.min.js') }} " type="text/javascript"></script>
  
  <!--  Notifications Plugin  -->  
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }} " type="text/javascript"></script>
  
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.min.js?v=2.1.0') }} " type="text/javascript"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('demo/demo.js') }} " type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>


</body>

</html>


