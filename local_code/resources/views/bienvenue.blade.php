@extends('layouts.unAuth')

@section('title', 'Bienvenue')

@section('content')

    @if (Session::has('flash_message'))
        <div class="alert alert-dismissible {{ Session::get('flash_type') }}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><i class="fa fa-check"></i> {{ Session::get('flash_message') }}</p>
        </div>
    @endif

    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>Bienvenue sur learnIT !</h1>
        <p class="lead">
            Envie de découvrir de nouvelles matières comme une langue ou un langage de programmation ?<br>
            Ou bien, prêt à écrire votre premier cours en ligne ?
        </p>

        <a href="{{ route('inscription') }}" class="btn btn-lg btn-success" title="Vers la page d'inscription">Inscription</a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <h2>Apprentissage</h2>
            <p id="learn3Phases">Il se fait en trois étapes :</p>
			<ol>
				<li>Apprentissage théorique avec exemples. </li>
				<li>Après chaque partie théorique, exercices pour fixer la matière. </li>
				<li>QCM noté sur 10 requerrant une cote minimale de 7/10 pour le passage au chapitre suivant.</li>
			</ol>
        </div>
        <div class="col-lg-4">
            @include('layouts.citations_bienvenue')
        </div>
        <div class="col-lg-4">
            <h2>learnIT mobile</h2>
            <p>
                Le site permet un accès sur ordinateur, tablette ou smartphone.  <br>
                Continuez à apprendre même sans wifi grâce à notre app pour un mode hors-ligne. <br>
                Apprennez où vous voulez, quand vous le voulez…
            </p>
            <p><a class="btn btn-primary disabled" href="#" role="button" disabled>Bientôt disponible</a></p>
        </div>
    </div>
@endsection
