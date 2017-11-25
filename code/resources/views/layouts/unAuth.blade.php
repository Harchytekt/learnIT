<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link href="{{ asset('css/Bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/462f499dd8.js"></script>
        <link href="{{ asset('css/bienvenue.css') }}" rel="stylesheet">

        @yield('title')

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            @auth
                <a class="navbar-brand" href="{{ url('/home') }}">
            @else
                <a class="navbar-brand" href="{{ url('/') }}">
            @endauth
                    <img src="{{ asset('img/logo.svg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                learnIT
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"     aria-expanded="true" href="{{ route('logout') }}"><i class="fa fa-user" aria-hidden="true"></i>
                            {{ Auth::user()->username }} <span class="caret"></span></a>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link register" href="{{ route('register') }}" title="Vers la page d'inscription">Créer un compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link login" href="{{ route('login') }}" title="Vers la page de connexion">S'identifier</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
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
