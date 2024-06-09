<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @hasSection('page_title')
            @yield('page_title') |
        @endif
        {{ env('APP_NAME') }}
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('aset/gambar/favicon.ico') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('aset/adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/custom/adminku-lte.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/plugins/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/plugins/daterangepicker/daterangepicker.css') }}">
    @auth
        <link rel="stylesheet" href="{{ asset('aset/plugins/datatables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('aset/plugins/summernote/summernote.min.css') }}">
    @endauth
    <!-- js -->
    <script type="text/javascript" src="{{ asset('aset/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('aset/plugins/jquery.validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/adminlte/js/adminlte.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('aset/plugins/sweetalert/sweetalert2.min.js') }}"></script>
    @auth
        <script type="text/javascript" src="{{ asset('aset/plugins/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('aset/plugins/summernote/summernote.min.js') }}"></script>
    @endauth
    <script type="text/javascript" src="{{ asset('aset/custom/adminku-lte.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" class="nav-link"> {{ env('APP_NAME') }} </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>&nbsp;
                        @auth
                            {{ auth()->user()->email }}
                        @endauth
                        @guest
                            Guest
                        @endguest
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 dropdown-menu-right">
                        @guest
                            <li><a href="{{ route('login') }}" class="dropdown-item"> Silahkan Login </a></li>
                        @endguest
                        @auth
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item text-muted text-center h5">
                                    {{ auth()->user()->name }} </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item text-muted text-center">
                                    <small> {{ auth()->user()->email }} </small>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('auth.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn btn-danger-outline">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-2">
            <!-- Brand Logo -->
            <a href="{{ asset('') }}" class="brand-link">
                <img src="{{ asset('aset/gambar/apps-logo.png') }}" class="brand-image img-circle elevation-1">
                <span class="brand-text font-weight-light">AdminKu</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ asset('') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        @include('layout.sidebar')
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pb-2 pl-2 pr-2">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                @yield('page_title')
                            </h3>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="preloader">
                    <div class="loading text-center">
                        <img src="{{ asset('aset/gambar/preloader.gif') }}" class="mb-3">
                        <p>Harap Tunggu</p>
                    </div>
                </div>
                @yield('page_content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block"> </div>
            <strong>
                Copyright &copy; 2024
                <a href="{{ asset('') }}">{{ env('APP_NAME') }}</a>
            </strong>
        </footer>
    </div>
    <!-- ./wrapper -->
</body>

</html>
