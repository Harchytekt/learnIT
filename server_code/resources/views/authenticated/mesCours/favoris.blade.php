@extends('layouts.auth')

@section('title', 'Favoris')

@section('content')
    <h1>Cours favoris</h1>

    @php($id = 0)
    @php($view = '')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            @if (App\Favorite::numberOfFavorites() == 0)
                <div style="color: #FFF; text-align: center; width: 100%; margin-top: 25%;">
                    <h3>C'est vide ici ! <i class="far fa-comment"></i></h3>
                    <a class="btn btn-info" href="/cours">Consultez les cours !</a>
                </div>
            @else
                @foreach ($courses as $course)
                    @include('authenticated.layouts.preview')
                    @php($id += 1)
                @endforeach
            @endif
        </div>
    </div>
@endsection
