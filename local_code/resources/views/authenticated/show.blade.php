@extends('layouts.auth')

@push('styles')
@endpush

<title>{{ $course->name }}</title>

@section('content')
    <div class="col-10 offset-1" style="background-color: #FFFFF0; border-radius: 10px;">
        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: relative; top: -30px; left: -15px;">
        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: absolute; top: -30px; right: -15px;">
        <h1 style="color: #2E2E2F;">{{ $course->name }}</h1>

        <p style="color: #4E4E4F;">{{ $course->description }}</p>

        <div style="width: 100%;">
            <div style="display: table; margin: 0 auto;">
                <h3>Chapitres</h3>
                <ol style="padding-left: 20px;">
                    <li style="list-style: none;">
                        <a href="#">1. Qu'est-ce que Python ?</a>
                    </li>
                    <li style="list-style: none;">
                        <a href="#">2. Premiers pas avec l'interpréteur de commandes Python</a>
                    </li>
                    <li style="list-style: none;">
                        <a href="#">3. Le monde merveilleux des variables</a>
                    </li>
                </ol>
            </div>
        </div>

        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: relative; left: -15px;">
        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: absolute; right: -15px;">
    </div>

    <div class="col-10 offset-1 col-sm-8 offset-sm-2" style="margin-top: 64px; margin-bottom: 100px; background-color: #FFFFF0; border-radius: 10px; transform: rotate(-1deg);">
        <img class="tape" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3" style="display: block;
        margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;">

        <h1 style="color: #2E2E2F;">Commentaires</h1>

        <div style="width: 100%;">
            <div style="width: 80%; display: table; margin: 0 auto;">
                <div style="padding: 10px 0;">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div style="color: #2AB77E;">
                                Formidable !
                            </div>
                            <span style="font-size: 75%; color: #C7C7C7;">il y a 10 secondes, par <span style="color: #808080;">Dexnaw</span></span>
                        </li>
                        <li class="list-group-item">
                            <div style="color: #2AB77E;">
                                Sympa !
                            </div>
                            <span style="font-size: 75%; color: #C7C7C7;">il y a 2 mois, par <span style="color: #808080;">floDV</span></span>
                        </li>
                        <li class="list-group-item">
                            <div style="color: #2AB77E;">
                                Super, j'adore le Python ! 🐍 Super, j'adore le Python ! 🐍 Super, j'adore le Python ! 🐍
                                Super, j'adore le Python ! 🐍 Super, j'adore le Python ! 🐍 Super, j'adore le Python ! 🐍
                                Super, j'adore le Python ! 🐍
                            </div>
                            <span style="font-size: 75%; color: #C7C7C7;">il y a 4 mois, par <span style="color: #808080;">Harchytekt</span></span>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="card-block">
                    <form method="POST" action="/posts/3/comments/" style="padding-top: 10px;">
                        <input type="hidden" name="_token" value="XTmlUjIOGU6aC1NJ3mvJfBs8wVKGvWKE87GiI7rd">
                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Écrivez votre commentaire." required=""></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ajoutez votre commentaire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <img class="tape" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3" style="display: block;
        margin-left: auto; margin-right: auto; position: relative; top: 25px; left: 5px;">
    </div>
@endsection
