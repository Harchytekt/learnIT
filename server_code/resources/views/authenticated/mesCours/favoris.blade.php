@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
@endpush

@section('title', 'Favoris')

@section('content')
    <h1>Cours favoris</h1>

    @php($id = 0)
    @php($view = 'preview')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        @if (App\Favorite::numberOfFavorites() == 0)
            <div class="row">
                @include('authenticated.layouts.vide')
            </div>
        @else
            <div class="row previewParent">
                @foreach ($courses as $course)
                    @include('authenticated.layouts.courses.apercuCours')
                    @php($id += 1)
                @endforeach
            </div>
        @endif
    </div>
@endsection
