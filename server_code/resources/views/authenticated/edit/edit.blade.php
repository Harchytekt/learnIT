@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<link href="{{ asset('css/alert.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/atom-one-dark.css') }}" rel="stylesheet"">
@endpush

<title>{{ $course->name }}</title>

@section('content')
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

    @include('authenticated.layouts.edit.edition')
@endsection

@push('js')
    <script src="{{ asset('js/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endpush
