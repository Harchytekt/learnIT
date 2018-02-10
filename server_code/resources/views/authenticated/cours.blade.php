@extends('layouts.auth')

@section('title', 'Cours')

@section('content')
    <h1>Cours</h1>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(5deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Apprenez à programmer en Python</h4>
                    <hr>
                    <p>Python est un langage de programmation qui nécessite d'écrire moins de lignes de code que le C ou le C++. Il se veut simple, concis et lisible. On l'utilise aussi bien pour créer des scripts que des programmes ou des sites web. Il est très populaire, notamment chez Google.</p>
                </div>
                <div style="position: absolute; bottom:0;">
                    <i class="fas fa-star" style="color: #e3cf7a"></i>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez la programmation orientée objet avec Python</h4>
                    <hr>
                    <p>La programmation orientée objet vous permet de structurer un programme de manière efficace. Concrètement, de nouveaux concepts tels que l'héritage, les instances ou les classes vont changer totalement la manière dont vous concevez vos programmes. Découvrez-les maintenant !</p>
                </div>
                <div style="position: absolute; bottom:0;">
                    <i class="fas fa-bookmark" style="color: #DC4535"></i> <i class="fas fa-star" style="color: #e3cf7a"></i>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-6deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez le framework Django</h4>
                    <hr>
                    <p>Vous connaissez Python ? Vous avez une idée de plateforme web mais ne savez pas vraiment comment la réaliser ? Alors vous connaissez déjà Django, le framework web pensé pour les perfectionnistes qui veulent tenir leurs deadlines.</p>
                </div>
                <div style="position: absolute; bottom:0;">
                    <i class="fas fa-bookmark" style="color: #DC4535"></i>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Concevez un site avec Flask</h4>
                    <hr>
                    <p>Gagnez du temps en utilisant un framework pour développer vos applications web en Python ! Le micro framework Flask permet d’en créer une en 7 lignes de code seulement. De la création à la mise en ligne en passant par les tests, vous allez apprendre à créer une application pour Facebook !</p>
                </div>
                <div style="position: absolute; bottom:0;">
                    <i class="fas fa-bookmark" style="color: #DC4535"></i>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-4deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Apprenez à créer votre site web avec HTML5 et CSS3</h4>
                    <hr>
                    <p>Vous rêvez d'apprendre à créer des sites web ? Débutez avec ce cours qui vous enseignera tout ce qu'il faut savoir sur le développement de sites web en HTML5 et CSS3 !</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-1deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Découvrez le framework PHP Laravel</h4>
                    <hr>
                    <p>Laravel est un nouveau framework PHP qui a le vent en poupe, notamment aux États-Unis. Découvrez son fonctionnement pas à pas dans ce cours !</p>
                </div>
                <div style="position: absolute; bottom:0;">
                    <i class="fas fa-bookmark" style="color: #DC4535"></i> <i class="fas fa-star" style="color: #e3cf7a"></i>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(6deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
                <div style="padding-bottom: 10px;">
                    <h4>Concevez votre site web avec PHP et MySQL</h4>
                    <hr>
                    <p>PHP est un langage de création de sites web dynamique très populaire. Son rôle est de générer des pages web HTML. Il permet de créer des blogs, des forums, des espaces membres... Facebook et Wikipedia sont des sites célèbres développés en PHP.</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 10px;">
                    <h4>Apprenez à coder avec JavaScript</h4>
                    <hr>
                    <p>"Program or be programmed" : avoir la capacité de comprendre, créer ou modifier des logiciels permet de devenir acteur du monde numérique qui nous entoure. Ce cours vous donnera les bases pour programmer avec le langage standard du Web : JavaScript.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
