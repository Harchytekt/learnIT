@extends('layouts.unAuth')

@section('title', 'Réinitialisation')

@section('content')
    <div class="card reset">
        <h1><i class="fa fa-history" aria-hidden="true"></i> Réinitialisation</h1>

        <div class="card-body">
            <div id="cardForm">

                <form class="form-horizontal" method="POST" action="{{ route('motdepasse.requete') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label"><i class="fa fa-paper-plane" aria-hidden="true"></i> Adresse email</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Mot de passe</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Confirmation du mot de passe</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-refresh" aria-hidden="true"></i>
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
