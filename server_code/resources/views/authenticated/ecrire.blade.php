@extends('layouts.auth')

@section('title', 'Écrire')

@section('content')
    <h1>Rédaction de cours</h1>

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate(-2deg);">
                <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
                <div style="padding-bottom: 42px; text-align: center;" title="Écrire un nouveau cours">
                    <i class="fas fa-plus fa-10x" style="color: rgba(0, 0, 0, 0.1);"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
