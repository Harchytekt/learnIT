@extends('layouts.error')

@section('title', 'Service indisponible')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">

        <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            Erreur 503 ! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        </h1>
        <p class="lead">
            On revient tout de suite.
        </p>

        @auth
            <a href="{{ route('accueil') }}" class="btn btn-lg btn-success" title="Vers la page d'accueil"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
        @else
            <a href="/" class="btn btn-lg btn-success" title="Vers la page de bienvenue"><i class="fa fa-globe" aria-hidden="true"></i> Bienvenue</a>
        @endauth

    </div>
@endsection

@section('source', asset('img/errors/503.svg'))
