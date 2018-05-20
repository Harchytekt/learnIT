@extends('layouts.auth')

@push('styles')
	<link href="{{ asset('css/course.css') }}" rel="stylesheet">
	<link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<link href="{{ asset('css/alert.css') }}" rel="stylesheet">
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/sunburst.css') }}" rel="stylesheet">
@endpush

<title>{{ $chapter->name }}</title>

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
	
    @include('authenticated.layouts.chapter')
@endsection

@push('js')
    <script src="{{ asset('js/chapitre.js') }}"></script>
    <script src="{{ asset('js/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<!-- Initialize Quill editor -->
	<script src="{{ asset('js/readQuill.js') }}"></script>
@endpush
