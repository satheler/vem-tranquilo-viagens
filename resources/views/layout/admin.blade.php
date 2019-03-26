<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>BusE-commerce</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>
<body class="theme-blue">
    <div class="container">
        @component('admin-nav')
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>