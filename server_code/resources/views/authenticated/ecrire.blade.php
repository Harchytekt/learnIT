@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/apercuCours.css') }}" rel="stylesheet">
@endpush

@section('title', 'Écrire')

@section('content')
    <h1>Rédaction de cours</h1>

    <div class="container">
        <div class="row previewParent">
            @include('authenticated.layouts.ajouterCours')
        </div>
    </div>
@endsection
