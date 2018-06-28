@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
	<link href="{{ asset('css/alert.css') }}" rel="stylesheet">
@endpush

@section('title', 'Écrire')

@section('content')
    <h1>Rédaction de cours</h1>

	@if (session('message'))
        @if (strpos(session('message'), 'succès' ) !== false)
            @php ($alertType = "alert-success")
            @php ($icon = "fas fa-check")
        @else
            @php ($alertType = "alert-danger")
            @php ($icon = "fas fa-times")
        @endif
        <div class="alert alert-dismissible {{ $alertType }}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><i class="{{ $icon }}"></i> {{ session('message') }}</p>
        </div>
    @endif

	@php($id = 0)
	@php($view = 'tutor')
	@php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        <div class="row previewParent">
            @include('authenticated.layouts.courses.ajouterCours')
            @if (!empty($courses))
    			@foreach ($courses as $course)
    				@include('authenticated.layouts.courses.apercuCours')
    				@php($id += 1)
    			@endforeach
            @endif
        </div>
    </div>
@endsection
