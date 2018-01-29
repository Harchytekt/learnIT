<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        @include('layouts.favicons')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link href="{{ asset('css/Bootstrap/bootstrap.css') }}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
        <link href="{{ asset('css/unAuthNavbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bienvenue.css') }}" rel="stylesheet">

        <title>@yield('title')</title>

    </head>
    <body>

        @include('layouts.unAuthNavbar')

        <div class="container">
            <main role="main">

                @yield('content')

                <div id="chalks">
                    <img src="{{ asset('img/Chalks.svg') }}" alt="" width="181" height="181">
                </div>

            </main>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- Popper -->
        <script src="{{ asset('js/Popper/popper.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/Bootstrap/bootstrap.min.js') }}"></script>
    </body>
</html>
