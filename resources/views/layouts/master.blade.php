<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

        <title>Agro Bearings</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

        @include('../partials/navbar')
        @yield('slider')

        <div id="app" class="mb-5">
            @yield('content')
        </div>

        @include('../partials/footer')

        <script type="text/javascript" src="../js/app.js"></script>

    </body>
</html>
