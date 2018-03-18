<div class="col-12 col-md-10 offset-md-1 vignette" id="courseBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <h1>{{ $course->name }}</h1>

    <p>{{ $course->description }}</p>

    <div class="outer">
        <div class="inner">
            <h3>Chapitres</h3>
            <ol class="chapters">
                @foreach ($course->chapters as $chapter)
                    @if ($chapter->isPublished())
                        <li>
                            <a href="/cours/{{ $course->id }}/{{ $chapter->id }}">{{ $chapter->name }}</a>
                        </li>
                    @else
                        <li class="disabledChapter">{{ $chapter->name }}</li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
