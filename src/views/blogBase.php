<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- TODO Change this to use sass so we can compile a
        single CSS file to include for back-end styles -->
        <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">

    </head>
    <body>
        <div class="mainWrapper container">
            <div class="row">
                @yield('mainContent')
            </div>
        </div>
    </body>
</html>
