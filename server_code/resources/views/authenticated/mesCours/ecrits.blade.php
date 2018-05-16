@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
@endpush

@section('title', 'Écrits')

@section('content')
    <h1>Cours que vous avez écrits</h1>

	@php($id = 0)
	@php($view = 'tutor')
	@php($angles = array(5, 1, -2, -6, 4, -1, 2, -5, -4, 6))

    <div class="container">
        <div class="row">
            @if (!Auth::user()->isATutor())
                @include('authenticated.layouts.vide')
            @else
				<div class="row previewParent">
	                @foreach ($courses as $course)
	                    @include('authenticated.layouts.courses.apercuCours')
	                    @php($id += 1)
	                @endforeach
	            </div>
            @endif
        </div>
    </div>
@endsection
