<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
@include('partials.head-css')
@yield('style-css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('partials.navbar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4 " style="">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">Tgms Togo</span>
    </a>

    <!-- Sidebar -->
    @include('partials.sidebar')

        <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
            @yield('header-content')
    <!-- /.content-header -->

    <!-- Main content -->

    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('partials.footer')


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

@include('partials.javascript')

@yield('custmo-js')
@include('flashy::message')
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</body>
</html>
