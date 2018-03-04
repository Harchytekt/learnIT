<div class="col-12 col-md-10 offset-md-1 vignetteBg" id="courseBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <h1>{{ $course->name }}</h1>

    <p>{{ $course->description }}</p>

    <div class="outer">
        <div class="inner">
            <h3>Chapitres</h3>
            <ol class="chapters">
                <li>
                    <a href="#">1. Qu'est-ce que Python ?</a>
                </li>
                <li>
                    <a href="#">2. Premiers pas avec l'interpréteur de commandes Python</a>
                </li>
                <li>
                    <a href="#">3. Le monde merveilleux des variables</a>
                </li>
            </ol>
        </div>
    </div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
