<div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3 preview" style="transform: rotate({{ $angles[$id % 10] }}deg);">
    @if ($id % 2 == 0)
        <img class="pushpin" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    @else
        <img class="tape" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
    @endif

    <div class="previewCase">
        <h4>{{ $course->name }}</h4>
        @if ($view != 'light')
            <hr>
            <p>{{ $course->description }}</p>
            @if ($view == 'all')
                <div class="previewIcons" hiddenValue="{{ $course->id }}">
					<a href="/coursinscrits/{{ $course->id }}">
	                    @if ($course->isEnrollment())
	                        <i class="fas fa-bookmark active"></i>
	                    @else
	                        <i class="fas fa-bookmark"></i>
	                    @endif
					</a>
					<a href="/favoris/{{ $course->id }}">
	                    @if ($course->isFavorite())
							<i class="fas fa-star active"></i>
	                    @else
	                        <i class="fas fa-star"></i>
	                    @endif
					</a>
                </div>
            @endif
        @endif
        @if ($course->published)
            <a href="/cours/{{ $course->id }}" class="btn btn-link courseLink">Voir le cours</a> <!-- $course->id -->
        @else
            <a href="" class="btn btn-link courseLink">Éditer le cours</a> <!-- $course->id -->
        @endif
    </div>
</div>
