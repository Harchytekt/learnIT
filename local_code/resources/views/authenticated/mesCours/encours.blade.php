@extends('layouts.auth')

@section('title', 'En cours')

@section('content')
    <h1>Cours en cours de lecture</h1>

    @php($id = 0)
    @php($view = 'preview')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        @if (App\Enrollment::numberOfInProgressEnrollments() == 0)
            <div class="row">
                @include('authenticated.layouts.vide')
            </div>
        @else
            <div class="row" style="margin-top: 45px;">
                @foreach ($courses as $course)
                    @include('authenticated.layouts.apercuCours')
                    @php($id += 1)
                @endforeach
            </div>
        @endif
    </div>
@endsection
