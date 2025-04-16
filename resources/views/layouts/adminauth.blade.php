<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPDB Online SMKN 1 Al-Mubarkeya') }}</title>

    <!-- Fonts -->
    <link href="{{ url('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ url('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/auth.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="mamba/assets/img/logombky2.png" rel="icon">

    <style>
        
    </style>
</head>
<body class="">

    <main>
        <div class="row" style="margin:0;">
            <div class="col-lg-4 bg-white text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
                
                <div class="" style="width: 100%;">

                    @yield('main-content')
                    
                </div>

            </div>
            <div class="col-lg-8  d-flex align-items-center justify-content-center" style="background-color: #dae3f9; ">
                <img class="d-none d-lg-block" src="{{ url('logotitlemubarkeya.png') }}" alt="" style="width: 65%">
            </div>
        </div>
    </main>
        

<!-- Scripts -->
<script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
