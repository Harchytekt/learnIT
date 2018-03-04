@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
@endpush

@section('title', 'Cours')

@section('content')
    <h1>Cours</h1>

    @php($id = 0)
    @php($view = 'all')
    @php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        <div class="row previewParent">
            @foreach ($courses as $course)
                @include('authenticated.layouts.courses.apercuCours')
                @php($id += 1)
            @endforeach
        </div>
    </div>
@endsection
