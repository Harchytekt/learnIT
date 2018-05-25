<div class="col-12 col-md-10 offset-md-1 vignette" id="courseBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <h1>{{ $course->name }}</h1>

    <p>{{ $course->description }}</p>

    <div class="outer">
        <div class="inner">
            <h3 class="text-center">Chapitres</h3>
            <ol class="chapters">
                @foreach ($course->chapters as $chapter)
                    @if ($chapter->isPublished() && $chapter->getLockState() < 2)
                        <li>
                            <a href="/cours/{{ $course->id }}/{{ $chapter->id }}">{{ $chapter->order_id }}. {{ $chapter->name }}</a>
                        </li>
					@elseif ($chapter->isPublished())
						<li class="disabledChapter">{{ $chapter->order_id }}. {{ $chapter->name }} <i class="wrong">(Débloquez moi !)</i></li>
                    @else
						@if (!$chapter->isPublished() && $course->userIsTutor())
							<li>
	                            <a href="/cours/{{ $course->id }}/{{ $chapter->id }}">{{ $chapter->order_id }}. {{ $chapter->name }} <i class="wrong">(Non publié)</i></a>
	                        </li>
						@else
							<li class="disabledChapter">{{ $chapter->order_id }}. {{ $chapter->name }}</li>
						@endif
                    @endif
                @endforeach
            </ol>

			@if ($course->userIsTutor())
				<hr>
				<div class="inner">
					<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group mr-2" role="group" aria-label="First group">
							<a href="/nouveauChapitre/{{ $course->id }}" class="btn btn-info" title="Ajouter un chapitre"><i class="fas fa-plus"></i> Ajouter un chapitre</a>
						</div>
						@if (!$course->isPublished())
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<button type="button" class="btn btn-info" title="Publier le cours" data-toggle="modal" data-target="#confirmerPublication"><i class="fas fa-cloud-upload-alt"></i> Publier le cours</button>
								<!-- Verification modal -->
							</div>
						@endif
					</div>
				</div>

				@if (!$course->isPublished())
					<!-- Modal Confirmation -->
					<div class="modal fade" id="confirmerPublication" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Êtes-vous sûr de vouloir publier votre cours ? <br>
									Une fois publié, il sera accessible à tous.
								</div>
								<div class="modal-footer">
									<a href="/publier/cours/{{ $course->id }}" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> Publier</a>
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
								</div>
							</div>
						</div>
					</div>
				@endif
			@endif
        </div>
    </div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
