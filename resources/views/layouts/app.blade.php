<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ClassPilot') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/components.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.header')
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title', 'Dashboard')</h1>
                        @yield('section-header')
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraries -->

    <!-- Template JS File -->
    <script src="{{ asset('stisla/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/dist/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    @stack('scripts')
</body>
</html>
