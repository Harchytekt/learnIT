@extends('layouts.auth')

@push('styles')
	<link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <style media="screen">
	.vignette {
		background-color   : #FFFFF0;
		color              : #4E4E4F;
	}

	h1,
	.grey {
	    color              : #2E2E2F;
	}

	.vignetteContent {
		margin: 20px;
	}

	.help-block {
		color: #DC4535;
	}
    </style>
@endpush

@section('title', 'Création du cours')

@section('content')
    @include('authenticated.layouts.courses.creerCours')
@endsection
