@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<link href="{{ asset('css/alert.css') }}" rel="stylesheet">
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/sunburst.css') }}" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- To save -->
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
	<script>
		var partId = {{ $part->id }}, urlBack = "/cours/{{ $course->id }}/{{ $chapter->id }}/{{ $part->order_id }}";
	</script>
	@if ($part->type == "quiz" || $part->type == "test")
		<!-- Quiz -->
		<script src="{{ asset('js/editQuiz.js') }}"></script>
	@else
	    <script src="{{ asset('js/highlight.pack.js') }}"></script>
	    <script>hljs.initHighlightingOnLoad();</script>
		<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

		<!-- Initialize Quill editor -->
		<script src="{{ asset('js/editQuill.js') }}"></script>
	@endif
	<script>
		$(document).on('click', '#save', function() {
			saveChanges();
		});
	</script>
@endpush
