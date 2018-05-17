@extends('layouts.auth')

@push('styles')
	<link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/initCours.css') }}" rel="stylesheet">
@endpush

@section('title', 'Création du cours')

@section('content')
    @include('authenticated.edit.creerCours')
@endsection
