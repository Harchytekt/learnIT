<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">

    <div style="padding: 20px">
        <h6>{{ $course->name }}</h6>
        <h1 style="text-align: center; padding-bottom: 20px;">{{ $chapter->name }}</h1>

        {!! $chapter->body !!}

    </div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
