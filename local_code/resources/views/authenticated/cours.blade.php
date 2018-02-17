@extends('layouts.auth')

@section('title', 'Cours')

@section('content')
    <h1>Cours</h1>

    @php($id = 0)
    @php($view = 'all')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            @foreach ($courses as $course)
                @include('authenticated.cours.preview')
                @php($id += 1)
            @endforeach
        </div>
    </div>
@endsection
