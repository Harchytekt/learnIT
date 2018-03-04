@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet"">
@endpush

<title>{{ $course->name }}</title>

@section('content')
    @include('authenticated.layouts.courses.course')

    @include('authenticated.layouts.courses.comments')
@endsection
