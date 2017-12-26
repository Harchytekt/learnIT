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
            <li class="nav-item">
                <a class="nav-link register" href="{{ route('inscription') }}" title="Vers la page d'inscription">Créer un compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link login" href="{{ route('connexion') }}" title="Vers la page de connexion">S'identifier</a>
            </li>
        </ul>
    </div>
</nav>
