@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
@endpush

@section('title', 'Aide importation')

@section('content')
    @include('authenticated.layouts.edit.helpUserImport')
@endsection
