@extends('layouts.auth')

@section('title', 'Inscrits')

@section('content')
    <h1>Cours auxquels vous êtes inscrit</h1>

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Concevez un site avec Flask</h4>
                    <hr>
                    <p>Gagnez du temps en utilisant un framework pour développer vos applications web en Python ! Le micro framework Flask permet d’en créer une en 7 lignes de code seulement. De la création à la mise en ligne en passant par les tests, vous allez apprendre à créer une application pour Facebook !</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-1deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez la programmation orientée objet avec Python</h4>
                    <hr>
                    <p>La programmation orientée objet vous permet de structurer un programme de manière efficace. Concrètement, de nouveaux concepts tels que l'héritage, les instances ou les classes vont changer totalement la manière dont vous concevez vos programmes. Découvrez-les maintenant !</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(6deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez le framework Django</h4>
                    <hr>
                    <p>Vous connaissez Python ? Vous avez une idée de plateforme web mais ne savez pas vraiment comment la réaliser ? Alors vous connaissez déjà Django, le framework web pensé pour les perfectionnistes qui veulent tenir leurs deadlines.</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez le framework PHP Laravel</h4>
                    <hr>
                    <p>Laravel est un nouveau framework PHP qui a le vent en poupe, notamment aux États-Unis. Découvrez son fonctionnement pas à pas dans ce cours !</p>
                </div>
            </div>
        </div>
    </div>
@endsection
