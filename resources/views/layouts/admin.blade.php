<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link"  href="" role="button">
                    logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin')}}" class="brand-link">
            <span class="brand-text font-weight-light" style="font-size: medium;">WHISKAS Purr of the Month Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">User Submissions</li>
                    <li class="nav-item">
                        <a href="{{route('allEntrant')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                All User Submissions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('featuredUserList')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Featured Submissions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('previousWinnerList')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Our Previous Winners
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Product</li>
                    <li class="nav-item">
                        <a href="{{route('productList')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Blogs</li>
                    <li class="nav-item">
                        <a href="{{route('blogList')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Purr More Banners</li>
                    <li class="nav-item">
                        <a href="{{route('addBanner')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Add New
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('recentBanners')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Recent Banners
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('oldBanners')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Old Banners
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">CSV Data</li>
                    <li class="nav-item">
                        <a href="{{route('mediacomView')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Download User Data
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @yield('content')
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy;  <a href="">2022 Mars & Affiliates</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.js"></script>

@yield('scripts')
</body>
</html>
