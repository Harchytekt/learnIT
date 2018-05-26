<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div class="vignetteContent">
		@if ($course->userIsTutor())
			@php($isQuiz = $part->type == 'quiz' || $part->type == 'test')
			<div class="inner">
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<button type="button" id="save" class="btn btn-success btn-block" title="Enregistrer les modifications"><i class="fas fa-save"></i></button>
					</div>
					@if ($isQuiz)
						<div class="btn-group mr-2" role="group" aria-label="Second group">
							<button type="button" id="addQuestion" class="btn btn-info btn-block" title="Ajouter une question"><i class="fas fa-plus"></i></button>
						</div>
						<div class="btn-group mr-2" role="group" aria-label="Third group">
							<button type="button" id="removeQuestion" class="btn btn-danger btn-block" title="Supprimer la dernière question"><i class="fas fa-minus"></i></button>
						</div>
						<div class="btn-group mr-2" role="group" aria-label="Fourth group">
							<button type="button" class="btn btn-warning btn-block" title="Importer un quiz"data-toggle="modal" data-target="#importModal"><i class="fas fa-cloud-upload-alt"></i></button>
							<!-- Import modal -->
						</div>
					@endif
					<div class="btn-group mr-2" role="group" aria-label="Fifth group">
						<a href="/cours/{{ $course->id }}/{{ $chapter->id }}/{{ $part->order_id }}" class="btn btn-secondary" title="Annuler les modifications"><i class="fas fa-times"></i></a>
					</div>
				</div>
			</div>
			<hr>
			<!-- Type of Part Modal -->
			<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importationModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="importationModal">Importation d'un quiz depuis un fichier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="importQuiz">
							<div class="modal-body">
								<div class="form-group">
									<input type="file" accept="text/json, .json">
								</div>
								Pour en savoir plus sur le format du fichier d'importation, <a target="_blank" href="/editer/aideImport" class="blue">cliquez ici</a> !
								<div id="error" class="red"></div>
							</div>
							<div class="modal-footer">
								<button type="button" id="importQ" class="btn btn-warning" disabled><i class="fas fa-cloud-upload-alt"></i> Importer</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		@endif

        <h6>
			<a href="/cours/{{ $course->id }}" class="tip" data-toggle="tooltip" data-placement="top" title="Retour à la description du cours">{{ $course->name }}</a>
		</h6>
        <h1 id="chapterName">{{ $chapter->order_id }}. {{ $chapter->name }}</h1>

		@if ($isQuiz)
			{!! $part->getBody() !!}
		@else
			<!-- Create toolbar container -->
			<div id="toolbar"></div>
			<!-- Create the editor container -->
			<div id="edit">{!! $part->getBody() !!}</div>
		@endif

	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
