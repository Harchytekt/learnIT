@extends('layouts.error')

@section('title', 'Méthode non authorisée')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">

        <h1><i class="fas fa-exclamation-triangle"></i>
            Erreur 405 ! <i class="fas fa-exclamation-triangle"></i>
        </h1>
        <p class="lead">
            Désolé, la méthode de requête n'est pas autorisée. <br>
            Vérifiez que la session n'a pas expiré avant l'exécution de la méthode.
        </p>

        <a href="/" class="btn btn-lg btn-success errorBtn" id="welcome" title="Vers la page de bienvenue"><i class="fas fa-globe"></i> Bienvenue</a>

    </div>
@endsection

@section('source', asset('img/errors/405.svg'))
