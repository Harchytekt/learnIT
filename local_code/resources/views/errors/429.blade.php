@extends('layouts.error')

@section('title', 'Erreur')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">

        <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            Erreur 429 ! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        </h1>
        <p class="lead">
            Il y a trop de requêtes.
        </p>

        @auth
            <a href="{{ route('accueil') }}" class="btn btn-lg btn-success" title="Vers la page d'accueil"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
        @else
            <a href="/" class="btn btn-lg btn-success" title="Vers la page de bienvenue"><i class="fa fa-globe" aria-hidden="true"></i> Bienvenue</a>
        @endauth

    </div>
@endsection

@section('source', asset('img/errors/429.svg'))
