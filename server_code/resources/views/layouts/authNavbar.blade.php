<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="{{ route('accueil') }}">
        <img src="{{ asset('img/logo.svg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        learnIT
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link fa-spin-hover" href="/cours"><i class="fas fa-university"></i> Cours</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle fa-spin-hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="/mescours"><i class="fas fa-list-ul"></i>
                Mes cours</a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item fa-spin-hover" href="/coursinscrits"><i class="fas fa-bookmark"></i>
                    Inscrits</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item fa-spin-hover" href="/favoris"><i class="fas fa-star"></i> Favoris</a>
                    <a class="dropdown-item fa-spin-hover" href="/encours"><i class="far fa-clock"></i> En cours</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item fa-spin-hover" href="/coursecrits"><i class="fas fa-edit"></i> Écrits</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fa-spin-hover" data-toggle="dropdown" role="button" aria-haspopup="true"     aria-expanded="true" href="/chiffres"><i class="fas fa-chart-line"></i> Mes chiffres</a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item fa-spin-hover" href="/chiffresinscrits"><i class="far fa-chart-bar"></i>
                    Inscrits</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item fa-spin-hover" href="/chiffresecrits"><i class="fas fa-chart-area"></i> Écrits</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link fa-spin-hover" href="/ecrire"><i class="fas fa-pencil-alt"></i> Rédaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link account fa-spin-hover" href="/compte"><i class="fas fa-sliders-h"></i> {{ Auth::user()->username }}</a>
            </li>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Chercher un cours">
                <div class="input-group-btn">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>-->
        <a class="btn btn-outline-danger fa-spin-hover" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Déconnexion
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</nav>
