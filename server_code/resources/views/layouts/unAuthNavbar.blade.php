<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    @auth
        <a class="navbar-brand" href="{{ route('accueil') }}">
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"     aria-expanded="true" href="{{ route('deconnexion') }}"><i class="fa fa-user" aria-hidden="true"></i>
                    {{ Auth::user()->username }} <span class="caret"></span></a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('deconnexion') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('deconnexion') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link register" href="{{ route('inscription') }}" title="Vers la page d'inscription">Créer un compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login" href="{{ route('connexion') }}" title="Vers la page de connexion">S'identifier</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
