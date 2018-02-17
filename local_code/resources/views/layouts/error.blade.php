<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        @include('layouts.favicons')

        <!-- CSS -->
        <link href="{{ asset('css/Bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link href="{{ asset('css/error.css') }}" rel="stylesheet">
        @auth
            <link href="{{ asset('css/authNavbar.css') }}" rel="stylesheet">
        @else
            <link href="{{ asset('css/unAuthNavbar.css') }}" rel="stylesheet">
        @endauth

        <title>@yield('title')</title>

    </head>
    <body>

        @auth
            @include('layouts.authNavbar')
        @else
            @include('layouts.unAuthNavbar')
        @endauth

        <div class="container">
            <main role="main">

                @yield('content')

                <div id="chalks">
                    <img src=@yield('source') alt="" width="181" height="181">
                </div>

            </main>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <!-- Popper -->
        <script src="{{ asset('js/Popper/popper.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/Bootstrap/bootstrap.min.js') }}"></script>
        @auth
            <!-- Other -->
            <script src="{{ asset('js/navbar.js') }}"></script>
        @endauth
    </body>
</html>
