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


        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: relative; left: -15px;">
        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52" style="display: inline;
        position: absolute; right: -15px;">
    </div>
@endsection
