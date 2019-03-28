<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>@yield('titlePage') :: @include('values.bussinessName') </title>

        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    @yield('fonts')

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    @yield('css')
    </head>

    <body class="theme-indigo">
        @yield('main')

        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
