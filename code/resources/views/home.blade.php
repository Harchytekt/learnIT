@extends('layouts.unAuth')

@section('title')
    <title>Accueil | learnIT</title>
@endsection

@section('content')

    <div class="card register">
        <h1><i class="fa fa-home" aria-hidden="true"></i> Accueil</h1>

        <div class="card-body">
            <div id="cardForm">

                @if (session('status'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p><i class="fa fa-check"></i> {{ session('status') }}</p>
                    </div>
                @endif

                Vous êtes connecté !

            </div>
        </div>

    </div>
@endsection
