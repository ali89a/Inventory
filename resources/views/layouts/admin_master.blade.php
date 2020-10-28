<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        // echo asset('');
        // echo app_path(); 
        ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @yield('style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css-bottom')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                <!--                    <li class="nav-item d-none d-sm-inline-block">
                                            <a href="#" class="nav-link">Contact</a>
                                        </li>-->
            </ul>

            <!-- Right Side Of Navbar -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Lang Dropdown Menu -->
                <li class="nav-item dropdown">
                    @php $locale = session()->get('locale'); @endphp
                    @switch($locale)
                    @case('bn')
                    <a class="nav-link" data-toggle="dropdown" href="">
                        <img src="{{asset('/')}}asset/admin/flags/bd.jpg" alt="user-image" class="mr-1" height="12">
                        <span class="align-middle">Bangla</span>
                    </a>
                    @break
                    @default
                    <a class="nav-link" data-toggle="dropdown" href="">
                        <img src="{{asset('/')}}asset/admin/flags/us.jpg" alt="user-image" class="mr-1" height="12">
                        <span class="align-middle">English</span>
                    </a>

                    @endswitch
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ url('lang/bn') }}" class="dropdown-item">

                            <img src="{{asset('/')}}asset/admin/flags/bd.jpg" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">বাংলা</span>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('lang/en') }}" class="dropdown-item">

                            <img src="{{asset('/')}}asset/admin/flags/us.jpg" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">English</span>

                        </a>
                    </div>
                </li>
                <li style="" class="nav-item">

                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @include('admin.partials.sidebar')

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

      @include('admin.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

@yield('script')
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
  
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('script-bottom')
</body>

</html>