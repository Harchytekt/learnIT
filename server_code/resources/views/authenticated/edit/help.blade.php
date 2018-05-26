@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/sunburst.css') }}" rel="stylesheet">
@endpush

@section('title', 'Aide importation')

@section('content')
    @include('authenticated.layouts.edit.helpImport')
@endsection

@push('js')
	<script src="{{ asset('js/highlight.pack.js') }}"></script>
	<script>hljs.initHighlightingOnLoad();</script>
@endpush
