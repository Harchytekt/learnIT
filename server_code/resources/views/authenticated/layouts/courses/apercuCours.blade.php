<div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-3 preview" style="transform: rotate({{ $angles[$id % 10] }}deg);">
    @if ($id % 2 == 0)
        <img class="pushpin" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    @else
        <img class="tape" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
    @endif
	@if ($course->isCompleted())
		<img class="medal" src="{{ asset('img/medal.svg') }}" alt="" height="50" width="50">
	@endif

    <div class="previewCase">
        <h4>{{ $course->name }}</h4>
        @if ($view != 'light')
            <hr>
            <p>{{ $course->description }}</p>
            <div class="previewIcons" hiddenValue="{{ $course->id }}">
				@if ($view == 'preview')
					<a href="/coursinscrits/{{ $course->id }}">
	                    @if ($course->isEnrollment())
	                        <i class="fas fa-bookmark active" title="Se désinscrire"></i>
	                    @else
	                        <i class="fas fa-bookmark" title="S'inscrire"></i>
	                    @endif
					</a>
					<a href="/favoris/{{ $course->id }}">
	                    @if ($course->isFavorite())
							<i class="fas fa-star active" title="Retirer des favoris"></i>
	                    @else
	                        <i class="fas fa-star" title="Ajouter aux favoris"></i>
	                    @endif
					</a>
				@else
					@if ($course->isPublished())
						<i class="fas fa-cloud" title="Publié"></i>
					@else
						<a href="/publier/cours/{{ $course->id }}">
							<i class="fas fa-cloud-upload-alt" title="Publier"></i>
						</a>
					@endif
				@endif
            </div>
        @endif
        @if ($course->published && $view != 'tutor')
            <a href="/cours/{{ $course->id }}" class="btn btn-link courseLink">Voir le cours</a>
			<!-- $course->id -->
        @else
            <a href="/edit/{{ $course->id }}" class="btn btn-link courseLink">Éditer le cours</a>
			<!-- $course->id -->
        @endif
    </div>
</div>
