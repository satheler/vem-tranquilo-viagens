<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@isset($title) {{ $title }} :: @endisset{{ config('app.name') }}</title>

        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Page plugins -->
        @stack('css')
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.min.css?v=1.0.0" rel="stylesheet">
        <!-- Custom CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">

    </head>
    <body class="{{ $class ?? '' }}">
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-indigo">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Carregando... Aguarde...</p>
            </div>
        </div>
        {{-- @auth() --}}
            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form> --}}
            @include('layouts.navbars.sidebar')
        {{-- @endauth --}}

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        {{-- @guest()
            @include('layouts.footers.guest')
        @endguest --}}

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/promise-polyfill/dist/polyfill.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/axios/dist/axios.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/script.js"></script>
        <script src="{{ asset('argon') }}/js/argon.min.js?v=1.0.0"></script>
    </body>
</html>
