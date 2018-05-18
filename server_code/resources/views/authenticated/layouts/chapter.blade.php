<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div style="padding: 20px">
		@if ($course->userIsTutor())
			<div class="inner">
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<a href="" class="btn btn-warning" title="Éditer le chapitre"><i class="fas fa-edit"></i> Éditer</a>
					</div>
					<div class="btn-group mr-2" role="group" aria-label="Second group">
						<a href="" class="btn btn-success" title="Ajouter une partie"><i class="fas fa-plus"></i> Ajouter une partie</a>
					</div>
					@if (!$chapter->isPublished())
						<div class="btn-group mr-2" role="group" aria-label="Third group">
							<button type="button" class="btn btn-info" title="Publier le chapitre" data-toggle="modal" data-target="#confirmerPublication"><i class="fas fa-cloud-upload-alt"></i> Publier</button>
							<!-- Verification modal -->
						</div>
					@endif
				</div>
			</div>

			@if (!$chapter->isPublished())
				<!-- Modal -->
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
								Êtes-vous sûr de vouloir publier votre chapitre ? <br>
								Une fois publié, il sera accessible à tous.
							</div>
							<div class="modal-footer">
								<a href="/publier/chapitre/{{ $chapter->id }}" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> Publier</a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
							</div>
						</div>
					</div>
				</div>
			@endif
			<hr>
		@endif

        <h6>
			<a href="/cours/{{ $course->id }}" class="tip" data-toggle="tooltip" data-placement="top" title="Retour à la description du cours">{{ $course->name }}</a>
		</h6>
        <h1 style="text-align: center; padding-bottom: 20px;">{{ $chapter->order_id }}. {{ $chapter->name }}</h1>

        <div class="pagination-container">{!! $chapter->getBody() !!}</div>
		<!-- entities escape  -->
	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
