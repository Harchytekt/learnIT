@extends('layouts.unAuth')

@section('title', 'Réinitialisation')

@section('content')
    <div class="card reset">
        <h1><i class="fas fa-history"></i> Réinitialisation</h1>

        <div class="card-body">
            <div id="cardForm">

                @if (session('status'))
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p><i class="fas fa-check"></i> {{ session('status') }}</p>
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('motdepasse.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label"><i class="fas fa-paper-plane"></i> Adresse email</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-link"></i> Envoyer le lien par mail
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
