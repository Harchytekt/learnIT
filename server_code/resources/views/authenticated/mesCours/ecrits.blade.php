@extends('layouts.auth')

@section('title', 'Écrits')

@section('content')
    <h1>Cours que vous avez écrits.</h1>

    <div class="container">
        <div class="row">
            <div style="color: #FFF; text-align: center; width: 100%; margin-top: 25%;">
                <h3>C'est vide ici ! <i class="far fa-comment"></i></h3>
                <a class="btn btn-info" href="/ecrire">Écrivez votre cours !</a>
            </div>
        </div>
    </div>
@endsection
