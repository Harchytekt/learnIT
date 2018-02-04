@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/compte.css') }}" rel="stylesheet">
@endpush

@section('title', 'Compte')

@section('content')
    <h1>Votre compte</h1>

    @if (Auth::user()->isATutor())
        <!-- 100x100 on smartphones -->
        @php ($status = "professeur")
        @php ($img = "tutor")
        @php ($rm = "Désactiver")
    @else
        @php ($status = "étudiant")
        @php ($img = "student")
        @php ($rm = "Supprimer")
    @endif

    <div class="jumbotron">

        <div class="clearfix">
            <div class="float-left">
                <h3>Bonjour {{ Auth::user()->username }} !</h3>
                <h6>(Dernière connexion {{ Auth::user()->lastLogin_at->diffForHumans() }})</h6>
            </div>

            <div class="float-right">
                <h4 id="createdAt">Inscription le {{ Auth::user()->created_at->formatLocalized('%A %d %B %Y') }}</h4>
            </div>
        </div>

        <div>
            <img src="{{ asset('img/users/'.$img.'.svg') }}" alt="" height="128" width="128">

            <span class="vars name">Monsieur</span> <span class="vars name">X, {{ $status }}</span>
            <button type="button" class="btn btn-link" id="modifyName">Modifier</button>
        </div>

        <hr>

        <div class="clearfix">
            <div class="float-left">
                <h4>Changer votre adresse mail</h4>
                <span class="label">Adresse mail actuelle :</span> <span class="vars">{{ Auth::user()->email }}</span> <br>
                <label class="label" for="newEmail">Nouvelle adresse mail : </label>
                <input type="email" name="newEmail" value=""> <br>
                <div class="centerBtn"><button type="button" class="btn btn-link">Modifier</button></div>
            </div>

            <div class="float-right">
                <div class="clearfix">
                    <h4>Changer votre mot de passe</h4>
                    <label class="label mdp" for="oldPwd">Ancien mot de passe : </label>
                    <input type="password" name="oldPwd" value=""> <br>
                    <label class="label mdp" for="newPwd1">Nouveau mot de passe : </label>
                    <input type="password" name="newPwd1" value=""> <br>
                    <label class="label mdp" for="newPwd2">Réécrire le nouveau mot de passe : </label>
                    <input class="label" type="password" name="newPwd2" value="">
                </div>
                <div class="centerBtn"><button type="button" class="btn btn-link">Modifier</button></div>
            </div>
        </div>

        <hr>

        <div id="rm">
            <div id="inner">
                <h4 id="rmAccount">{{ $rm }} le compte</h4>
                <div class="centerBtn"><button type="button" class="btn btn-outline-danger">{{ $rm }}</button></div>
            </div>
        </div>
    </div>
@endsection
