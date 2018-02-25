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

    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 offset-sm-1 white">
                Pour l'instant, vous êtes inscrit à <span class="green">{{ App\Enrollment::numberOfEnrollments() }}</span> cours et vous en avez placé <span class="green">{{ App\Favorite::numberOfFavorites() }}</span> dans vos favoris.
            </div>
        </div>
        <div class="row previewParent">
            <div class="col-11"><h2 id="star"><i class="fas fa-star"></i> Favoris</h2></div>

            @if (App\Favorite::numberOfFavorites() == 0)
                <h4 class="void">Vous n'avez pas encore de favoris. <i class="far fa-frown"></i></h4>
            @else
                @foreach ($favs as $course)
                    @include('authenticated.layouts.apercuCours')
                    @php($id += 1)
                @endforeach
            @endif

        </div>
            <div class="row">
                <div class="col-11"><h2 id="bookm"><i class="fas fa-bookmark"></i> Inscrits</h2></div>

                @if (App\Enrollment::numberOfEnrollments() == 0)
                    <h4 class="void">Vous n'êtes pas encore inscrit à un cours. <i class="far fa-frown"></i></h4>
                @else
                    @foreach ($enrs as $course)
                        @include('authenticated.layouts.apercuCours')
                        @php($id += 1)
                    @endforeach
                @endif

            </div>
    </div>
@endsection
