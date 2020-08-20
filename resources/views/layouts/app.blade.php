<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Konoha Library - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor_sb/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
   <!-- Sweetalert styles for this template-->
  <link href="{{asset('css/sweetalert2.min.css') }}" rel="stylesheet">

</head>
<body @yield('body')>
        <main class="py-4">
            @yield('content')
        </main>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor_sb/jquery/jquery.min.js ') }}"></script>
  <script src="{{asset('vendor_sb/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor_sb/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor_sb/chart.js/Chart.min.js ') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{asset('js/demo/chart-pie-demo.js') }}"></script>
   <script src="{{asset('js/sweetalert2.min.js') }}"></script>
   <script src="{{asset('js/main.js') }}"></script>

</body>

</html>
