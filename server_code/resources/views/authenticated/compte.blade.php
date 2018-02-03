@extends('layouts.auth')

@section('title', 'Compte')

@section('content')
    <h1 style="display: inline;">Votre compte </h1>
    <h6 style="display: inline;">(Dernière connexion {{ Auth::user()->lastLogin_at->diffForHumans() }})</h6>


    <h4>Date d'inscription : {{ Auth::user()->created_at->formatLocalized('%d %B %Y') }}</h4>
@endsection
