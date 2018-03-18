@extends('layouts.auth')

@push('styles')
<link href="{{ asset('css/course.css') }}" rel="stylesheet">
<link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
<link href="{{ asset('css/firaCode.css') }}" rel="stylesheet"">
@endpush

<title>{{ $chapter->name }}</title>

@section('content')
    @include('authenticated.layouts.chapter')
@endsection

@push('js')
    <script src="{{ asset('js/chapitre.js') }}"></script>
@endpush
