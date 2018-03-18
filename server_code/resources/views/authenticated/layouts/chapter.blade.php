<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">

    <div style="padding: 20px">
        <h6><a href="/cours/{{ $course->id }}" class="tip" data-toggle="tooltip" data-placement="top" title="Retour à la description du cours">{{ $course->name }}</a></h6>
        <h1 style="text-align: center; padding-bottom: 20px;">{{ $chapter->name }}</h1>

        <!-- {!! $chapter->body !!} -->

        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <span class='pop' data-container="body" data-toggle="popover" data-placement="top" data-content="Ces langages sont le HTML et le CSS." data-original-title="Info">Duis</span> aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->

        <div class="pagination-container" >{!! $chapter->body !!}</div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
