@extends('layouts.unAuth')

@section('title', 'Inscription')

@section('content')
    <div class="card register">
        <h1><i class="far fa-address-card"></i> Inscription</h1>

        <div class="card-body">
            <div id="cardForm">

                <form class="form-horizontal" method="POST" action="{{ route('inscription') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="control-label"><i class="fas fa-user"></i> Pseudo</label>

                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Pseudo" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label"><i class="fas fa-paper-plane"></i> Adresse email</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Adresse email" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label"><i class="fas fa-key"></i> Mot de passe</label>

                        <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label"><i class="fas fa-key"></i> Confirmation du mot de passe</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmation du mot de passe" required>
                    </div>

                    <div class="form-group end">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Inscription</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
