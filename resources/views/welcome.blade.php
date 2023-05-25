<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Students Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                    <a href="{{ auth()->user()->is_admin ? url('dashboard') : url('/standard_users/dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center" style="height: 80vh;">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Welcome to the Student Management System</h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    This is a student management system developed using Bootstrap, Laravel, and phpMyAdmin database. The system has two user roles: Administrator and Standard User.
                                </p>
                                <div class="form-group row d-flex flex-column">
                                    <div class="col-12"><strong>Project Managers:</strong></div>
                                    <div class="col-md-6 col-12">Mohamed 2110206512</div>
                                    <div class="col-md-6 col-12">Kalid 2110206565</div>
                                    <div class="col-md-6 col-12">Yahye 1910206553</div>
                                </div>
                                </div>
                        <div class="card-footer text-center">
                            @auth
                                <a href="{{ auth()->user()->is_admin ? url('dashboard') : url('/standard_users/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    @include('partials.admin.footer')
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
