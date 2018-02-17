<div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3" style="background-color: #FFFFE5; border-radius: 10px; margin-bottom: 45px; transform: rotate({{ $angles[$id % 10] }}deg);">
    @if ($id % 2 == 0)
        <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    @else
        <img style="display: block; margin-left: auto; margin-right: auto; position: relative; top: -30px; left: 5px;" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
    @endif

    <div style="padding-bottom: 10px;">
        <h4>{{ $course->name }}</h4>
        @if ($view != 'light')
            <hr>
            <p>{{ $course->description }}</p>
            @if ($view == 'all')
                <div style="position: absolute; bottom:0;">
                    @if ($course->isEnrollment())
                        <i class="fas fa-bookmark" style="color: #DC4535"></i>
                    @else
                        <i class="fas fa-bookmark" style="color: #E8E7CF"></i>
                    @endif
                    @if ($course->isFavorite())
                        <i class="fas fa-star" style="color: #FCDB69"></i>
                    @else
                        <i class="fas fa-star" style="color: #E8E7CF"></i>
                    @endif
                </div>
            @endif
        @endif
    </div>
</div>
