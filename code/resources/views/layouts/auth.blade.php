<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- CSS -->
        <link href="{{ asset('css/Bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/462f499dd8.js"></script>
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/basic.css') }}" rel="stylesheet">

        <style media="screen">

        </style>

        </head>

        @yield('title')

    </head>

    <body>

        @include('layouts.navbar')

        <div class="container">
            <main role="main">

                @yield('content')

            </main>
        </div>

    </body>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('js/Popper/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/Bootstrap/bootstrap.min.js') }}"></script>
    <!-- Other -->
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
    </script>

</html>
