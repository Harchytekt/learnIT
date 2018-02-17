@extends('layouts.auth')

@section('title', 'Accueil')

@section('content')
    <h1>Accueil</h1>

    <h3 style="color: #FFF;">Bienvenue {{ Auth::user()->username }} !</h3>

    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 offset-sm-1" style="color: #FFF;">
                Pour l'instant, vous êtes inscrit à <span class="green" style="color: #2AB77E">4</span> cours et vous en avez placé <span class="green" style="color: #2AB77E">3</span> dans vos favoris.
            </div>
        </div>
        <div class="row" style="margin-top: 45px;">
            <div class="col-11"><h2 style="padding-bottom: 20px;"><i class="fas fa-star" style="color: #FCDB69"></i> Favoris</h2></div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(5deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Apprenez à programmer en Python</h4>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez la programmation orientée objet avec Python</h4>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-6deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez le framework PHP Laravel</h4>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-11"><h2 style="padding-bottom: 20px;"><i class="fas fa-bookmark" style="color: #DC4535"></i> Inscrits</h2></div>
                <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-1deg);">
                    <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                    <div style="padding-bottom: 10px;">
                        <h4>Concevez un site avec Flask</h4>
                    </div>
                </div>
                <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(2deg);">
                    <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                    <div style="padding-bottom: 10px;">
                        <h4>Découvrez la programmation orientée objet avec Python</h4>
                    </div>
                </div>
                <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-4deg);">
                    <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                    <div style="padding-bottom: 10px;">
                        <h4>Découvrez le framework Django</h4>
                    </div>
                </div>
                <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(6deg);">
                    <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                    <div style="padding-bottom: 10px;">
                        <h4>Découvrez le framework PHP Laravel</h4>
                    </div>
                </div>
            </div>
    </div>
@endsection
