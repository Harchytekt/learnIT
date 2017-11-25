<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="{{ url('/home') }}">
        <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        learnIT
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/cours"><i class="fa fa-university" aria-hidden="true"></i> Cours</a>
            </li>
            <li class="nav-item dropdown active">
                <!--<a class="nav-link" href="/mescours"><i class="fa fa-leanpub" aria-hidden="true"></i> Mes cours</a>-->
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"     aria-expanded="true" href="/mescours"><i class="fa fa-leanpub" aria-hidden="true"></i>
                Mes cours</a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="/coursinscrits"><i class="fa fa-list" aria-hidden="true"></i>
                    Inscrits</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/favoris"><i class="fa fa-star" aria-hidden="true"></i> Favoris</a>
                    <a class="dropdown-item" href="/encours"><i class="fa fa-clock-o" aria-hidden="true"></i> En cours</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/coursecrits"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Écrits</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <!--<a class="nav-link" href="/chiffres"><i class="fa fa-bar-chart" aria-hidden="true"></i> Mes chiffres</a>-->
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"     aria-expanded="true" href="/chiffres"><i class="fa fa-line-chart" aria-hidden="true"></i> Mes chiffres</a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="/chiffresinscrits"><i class="fa fa-bar-chart" aria-hidden="true"></i>
                    Inscrits</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/chiffresecrits"><i class="fa fa-area-chart" aria-hidden="true"></i> Écrits</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ecrire"><i class="fa fa-pencil" aria-hidden="true"></i> Écrire un cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/compte"><i class="fa fa-sliders" aria-hidden="true"></i> Compte</a>
                <!-- <i class="fa fa-cog" aria-hidden="true"></i>
                <i class="fa fa-wrench" aria-hidden="true"></i> -->
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Chercher un cours">
                <div class="input-group-btn">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
            <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
    </div>
</nav>
