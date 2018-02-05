@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/compte.css') }}" rel="stylesheet">
@endpush

@section('title', 'Compte')

@section('content')
    <h1>Votre compte</h1>

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

    @if (Auth::user()->isATutor())
        <!-- 100x100 on smartphones -->
        @php ($status = "professeur(e)")
        @php ($img = "tutor")
        @php ($rm = "Désactiver")
    @else
        @php ($status = "étudiant(e)")
        @php ($img = "student")
        @php ($rm = "Supprimer")
    @endif

    <div class="jumbotron">

        <div class="clearfix">
            <div class="float-left">
                <h3>Bonjour {{ Auth::user()->username }} !</h3>
                <h6>(Dernière connexion {{ Auth::user()->lastLogin_at->diffForHumans() }})</h6>
            </div>

            <div class="float-left float-md-right">
                <h4 id="createdAt">Inscription le {{ Auth::user()->created_at->formatLocalized('%A %d %B %Y') }}</h4>
            </div>
        </div>

        <div>
            <img id="usersIcon" src="{{ asset('img/users/'.$img.'.svg') }}" alt="" height="128" width="128">

            <span class="vars" id="name">{{ Auth::user()->getName() }}, {{ $status }}</span>
            <div id="centerBtnName">
                <button type="button" class="btn btn-link" id="modifyName">Modifier le nom</button>
            </div>
        </div>

        <hr>

        <div class="clearfix">
            <div class="centerModify">
                <div class="float-left">
                    <h4>Changer votre adresse email</h4>
                    <form class="form-horizontal" method="POST" action="/majemail">
                        {{ csrf_field() }}
                        <span class="label">Adresse email actuelle :</span> <span class="vars">{{ Auth::user()->email }}</span> <br>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nouvelle adresse email" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="centerBtn"><button type="submit" class="btn btn-link">Enregistrer la nouvelle adresse email</button></div>
                    </form>
                </div>
            </div>

            <div class="centerModify">
                <div class="float-left float-lg-right">
                    <div class="clearfix">
                        <h4>Changer votre mot de passe</h4>
                        <label class="label mdp" for="oldPwd">Ancien mot de passe : </label>
                        <input type="password" name="oldPwd" value=""> <br>
                        <label class="label mdp" for="newPwd1">Nouveau mot de passe : </label>
                        <input type="password" name="newPwd1" value=""> <br>
                        <label class="label mdp" for="newPwd2">Réécrire le nouveau mot de passe : </label>
                        <input type="password" name="newPwd2" value="">
                    </div>
                    <div class="centerBtn"><button type="button" class="btn btn-link">Enregistrer le nouveau mot de passe</button></div>
                </div>
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
