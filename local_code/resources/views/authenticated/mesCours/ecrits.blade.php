@extends('layouts.auth')

@section('title', 'Écrits')

@section('content')
    <h1>Vos cours.</h1>

    <div class="container">
        <div class="row">
            @if (!Auth::user()->isATutor())
                @include('authenticated.layouts.vide')
            @else
                <h4>TODO</h4>
            @endif
        </div>
    </div>
@endsection
