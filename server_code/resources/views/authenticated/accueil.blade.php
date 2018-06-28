@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
@endpush

@section('title', 'Accueil')

@section('content')
    <h1>Accueil</h1>

    @php($id = 0)
    @php($view = 'light')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <h3>Bienvenue {{ Auth::user()->username }} !</h3>
	@php($nbEnrols = App\Enrollment::getNumberOfEnrollments())
	@php($nbFavs = App\Favorite::getNumberOfFavorites())

    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 offset-sm-1 white">
                Pour l'instant, vous êtes inscrit à <span class="green">{{ $nbEnrols }}</span> cours et vous en avez placé <span class="green">{{ $nbFavs }}</span> dans vos favoris.
            </div>
        </div>
        <div class="row previewParent">
            <div class="col-11">
				<h2 id="star"><i class="fas fa-star"></i> Favoris</h2>
				<span id="nbOfStar">({{ $nbFavs }})</span>
				<a href="/favoris" class="linkH2Title" title="Vers les favoris"><i class="fas fa-link fa-sm"></i></a>
			</div>

            @if ($nbFavs == 0)
                <h4 class="void">Vous n'avez pas encore de favoris. <i class="far fa-frown"></i></h4>
            @else
				@foreach ($favs->slice(0, 3) as $course) <!-- Only show the 3 firsts -->
					@include('authenticated.layouts.courses.apercuCours')
                    @php($id += 1)
                @endforeach
            @endif
        </div>
        <div class="row">
			<div class="col-11">
				<h2 id="bookm"><i class="fas fa-bookmark"></i> Inscrits</h2>
				<span id="nbOfBookm">({{ $nbEnrols }})</span>
				<a href="/coursinscrits" class="linkH2Title" title="Vers les cours auxquels vous êtes inscrit"><i class="fas fa-link fa-sm"></i></a>
			</div>

            @if ($nbEnrols == 0)
                <h4 class="void">Vous n'êtes pas encore inscrit à un cours. <i class="far fa-frown"></i></h4>
            @else
                @foreach ($enrs->slice(0, 3) as $course)
                    @include('authenticated.layouts.courses.apercuCours')
                    @php($id += 1)
                @endforeach
            @endif

        </div>
    </div>
@endsection
