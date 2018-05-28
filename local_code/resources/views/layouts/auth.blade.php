<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        @include('layouts.favicons')

        <!-- CSS -->
        <link href="{{ asset('css/Bootstrap/bootstrap.css') }}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
        <link href="{{ asset('css/authNavbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
        @stack('styles') <!-- Add style from pages using the layout -->

        <title>@yield('title')</title>

    </head>
    <body>

        @include('layouts.authNavbar')

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

    @stack('js') <!-- Add style from pages using the layout -->
</html>
