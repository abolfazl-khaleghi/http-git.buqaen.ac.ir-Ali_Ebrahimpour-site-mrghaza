<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> پنل مدیریت سایت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= Url('plugins/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Url('dist/css/adminlte.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= Url('plugins/iCheck/flat/blue.css') ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= Url('plugins/morris/morris.css') ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= Url('plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= Url('plugins/datepicker/datepicker3.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= Url('plugins/daterangepicker/daterangepicker-bs3.css') ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= Url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="<?= Url('dist/css/bootstrap-rtl.min.css') ?>">
    <link rel="stylesheet" href="<?= Url('plugins/bootstrap/css/bootstrap-select.min.css') ?>">
    <!-- template rtl version -->
    <link rel="stylesheet" href="<?= Url('dist/css/custom-style.css') ?>">
    <link rel="stylesheet" href="<?= Url('css/sweetalert.css') ?>">


    @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/" target="_blank" class="nav-link"  href="#">صفحه اصلی سایت</a>
            </li>
        </ul>



        <!-- SEARCH FORM -->
        {{--<form class="form-inline ml-3">--}}
            {{--<div class="input-group input-group-sm">--}}
                {{--<input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">--}}
                {{--<div class="input-group-append">--}}
                    {{--<button class="btn btn-navbar" type="submit">--}}
                        {{--<i class="fa fa-search"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

@include('panel.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<div class="content-header">--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="row mb-2">--}}
                    {{--<div class="col-sm-6">--}}
                        {{--<h1 class="m-0 text-dark">صفحه اصلی</h1>--}}
                    {{--</div><!-- /.col -->--}}
                    {{--<div class="col-sm-6">--}}
                        {{--<ol class="breadcrumb float-sm-left">--}}
                            {{--<li class="breadcrumb-item"><a href="#">خانه</a></li>--}}
                            {{--<li class="breadcrumb-item active">صفحه اصلی</li>--}}
                        {{--</ol>--}}
                    {{--</div><!-- /.col -->--}}
                {{--</div><!-- /.row -->--}}
            {{--</div><!-- /.container-fluid -->--}}
        {{--</div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @yield('content')
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>CopyLeft &copy; 2020 <a href="http://github.com/aliebrahimpour/">علی ابراهیم پور</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= Url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= Url('plugins/jquery/jquery-ui.min.js') ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= Url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?= Url('plugins/raphael-min.js') ?>"></script>

<script src="<?= Url('plugins/morris/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= Url('plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?= Url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= Url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= Url('plugins/knob/jquery.knob.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= Url('plugins/moment.min.js') ?>"></script>

<script src="<?= Url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?= Url('plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= Url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?= Url('plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= Url('plugins/fastclick/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= Url('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= Url('dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= Url('dist/js/demo.js') ?>"></script>
<script src="<?= Url('js/bootstrap-select.min.js') ?>"></script>
<script src="<?= Url('js/sweetalert2.all.js') ?>"></script>
@include('sweetalert::alert')
@yield('script')

</body>
</html>

