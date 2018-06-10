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
        @include('../partials/slider')

        <div id="app">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <sidebar-menu :categories="{{ json_encode($categories) }}" />
                         {{-- {{ json_encode($categories) }} --}}
                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('../partials/footer')

        <script type="text/javascript" src="../js/app.js"></script>

    </body>
</html>
