@extends('layouts.auth')

@push('styles')
	<link href="{{ asset('css/course.css') }}" rel="stylesheet">
	<link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/sunburst.css') }}" rel="stylesheet">
@endpush

<title>{{ $chapter->name }}</title>

@section('content')
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
