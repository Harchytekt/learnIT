@extends('layouts.auth')

@section('title', 'Accueil')

@section('content')
    <h1>Accueil</h1>

    @php($id = 0)
    @php($view = 'light')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <h3 style="color: #FFF;">Bienvenue {{ Auth::user()->username }} !</h3>

    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 offset-sm-1" style="color: #FFF;">
                Pour l'instant, vous êtes inscrit à <span class="green" style="color: #2AB77E">{{ App\Enrollment::numberOfEnrollments() }}</span> cours et vous en avez placé <span class="green" style="color: #2AB77E">{{ App\Favorite::numberOfFavorites() }}</span> dans vos favoris.
            </div>
        </div>
        <div class="row" style="margin-top: 45px;">
            <div class="col-11"><h2 style="padding-bottom: 20px;"><i class="fas fa-star" style="color: #FCDB69"></i> Favoris</h2></div>

            @if (App\Favorite::numberOfFavorites() == 0)
                <h4 style="color: #FFF;">Vous n'avez pas encore de favoris. <i class="far fa-frown"></i></h4>
            @else
                @foreach ($favs as $course)
                    @include('authenticated.layouts.preview')
                    @php($id += 1)
                @endforeach
            @endif

        </div>
            <div class="row">
                <div class="col-11"><h2 style="padding-bottom: 20px;"><i class="fas fa-bookmark" style="color: #DC4535"></i> Inscrits</h2></div>

                @if (App\Enrollment::numberOfEnrollments() == 0)
                    <h4 style="color: #FFF;">Vous n'êtes pas encore inscrit à un cours. <i class="far fa-frown"></i></h4>
                @else
                    @foreach ($enrs as $course)
                        @include('authenticated.layouts.preview')
                        @php($id += 1)
                    @endforeach
                @endif

            </div>
    </div>
@endsection
