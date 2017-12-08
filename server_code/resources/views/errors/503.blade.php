@extends('layouts.error')

@section('title', 'Service indisponible')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">

        <h1><i class="fas fa-exclamation-triangle"></i>
            Erreur 503 ! <i class="fas fa-exclamation-triangle"></i></i>
        </h1>
        <p class="lead">
            On revient tout de suite.
        </p>

        @auth
            <a href="{{ route('accueil') }}" class="btn btn-lg btn-success" title="Vers la page d'accueil"><i class="fas fa-home"></i> Accueil</a>
        @else
            <a href="/" class="btn btn-lg btn-success" title="Vers la page de bienvenue"><i class="fas fa-globe"></i> Bienvenue</a>
        @endauth

    </div>
@endsection

@section('source', asset('img/errors/503.svg'))
