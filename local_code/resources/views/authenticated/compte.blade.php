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
        @php ($status = "professeur(e)")
        @php ($img = "tutor")
    @else
        @php ($status = "étudiant(e)")
        @php ($img = "student")
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
                <button type="button" class="btn btn-link" id="modifyName" data-toggle="modal" data-target="#nameModal">Modifier le nom</button>
            </div>

            <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="nameModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modifier le nom</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="/majnames">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    @if (Auth::user()->firstname !== null)
                                        <input type="text" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}">
                                    @else
                                        <input type="text" class="form-control" name="firstname" placeholder="Prénom">
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if (Auth::user()->lastname !== null)
                                        <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}">
                                    @else
                                        <input type="text" class="form-control" name="lastname" placeholder="Nom de famille">
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

                        <div class="form-group">
                            <input id="email" type="email" class="form-control" name="email"  placeholder="Nouvelle adresse email" required>
                        </div>

                        <div class="centerBtn"><button type="submit" class="btn btn-link">Enregistrer la nouvelle adresse email</button></div>
                    </form>
                </div>
            </div>

            <div class="centerModify">
                <div class="float-left float-lg-right">
                    <div class="clearfix">
                        <h4>Changer votre mot de passe</h4>
                        <form class="form-horizontal" method="POST" action="/majmdp">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input id="password_old" type="password" class="form-control" name="password_old" placeholder="Ancien mot de passe" required>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Nouveau mot de passe" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Taille <em>entre</em> <b>6</b> <em>et</em> <b>20</b> caractères. <br>Au moins <b>1</b> <em>majuscule</em>, <b>1</b> <em>minuscule</em>, <b>1</b> <em>chiffre</em> et <b>1</b> <em>caractère spécial</em>." required>
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Réécrire le nouveau mot de passe" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Taille <em>entre</em> <b>6</b> <em>et</em> <b>20</b> caractères. <br>Au moins <b>1</b> <em>majuscule</em>, <b>1</b> <em>minuscule</em>, <b>1</b> <em>chiffre</em> et <b>1</b> <em>caractère spécial</em>." required>
                            </div>

                            <div class="centerBtn"><button type="submit" class="btn btn-link">Enregistrer le nouveau mot de passe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (!Auth::user()->isATutor())
            <hr>

            <div id="rm">
                <div id="inner">
                    <h4 id="rmAccount">Supprimer le compte</h4>
                    <div class="centerBtn"><a class="btn btn-outline-danger" href="/supprimercompte">Supprimer</a></div>
                </div>
            </div>
        @endif
    </div>
@endsection
