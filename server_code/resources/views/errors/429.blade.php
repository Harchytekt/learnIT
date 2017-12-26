@extends('layouts.error')

@section('title', 'Erreur')

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">

        <h1><i class="fas fa-exclamation-triangle"></i>
            Erreur 429 ! <i class="fas fa-exclamation-triangle"></i>
        </h1>
        <p class="lead">
            Il y a trop de requêtes.
        </p>

        <a href="/" class="btn btn-lg btn-success errorBtn" id="welcome" title="Vers la page de bienvenue"><i class="fas fa-globe"></i> Bienvenue</a>

        <a href="{{ route('accueil') }}" class="btn btn-lg btn-success errorBtn" title="Vers la page d'accueil (connecté)"><i class="fas fa-home"></i> Accueil</a>

    </div>
@endsection

@section('source', asset('img/errors/429.svg'))
