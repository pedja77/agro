<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

        <title>Agro Bearings</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

        @include('../partials/navbar')
        @include('../partials/slider')

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    Sidebar - categories
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>


        </div>



        <script src="/js/app.js"></script>
    </body>
</html>
