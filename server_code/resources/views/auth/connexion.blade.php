@extends('layouts.unAuth')

@section('title', 'Connexion')

@section('content')
    <div class="card login">
        <h1><i class="far fa-id-badge"></i> Identification</h1>

        <div class="card-body">
            <div id="cardForm">

                <form class="form-horizontal" method="POST" action="{{ route('connexion') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label"><i class="fas fa-paper-plane"></i> Adresse email</label></label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label"><i class="fas fa-key"></i> Mot de passe</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                            </label>
                        </div>
                    </div>

                    <div class="form-group end">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Connexion
                        </button>

                        <p class="link">
                            <a href="{{ route('motdepasse.requete') }}">
                                Mot de passe oublié ?
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
