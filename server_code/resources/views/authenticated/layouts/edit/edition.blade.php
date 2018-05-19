<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div style="padding: 20px">
		@if ($course->userIsTutor())
			<div class="inner">
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<button type="button" id="save" class="btn btn-success btn-block" title="Enregistrer les modifications"><i class="fas fa-save"></i></button>
					</div>
					<div class="btn-group mr-2" role="group" aria-label="Second group">
						<a href="/cours/{{ $course->id }}/{{ $chapter->id }}?part={{ $part->order_id }}" class="btn btn-secondary" title="Annuler les modifications"><i class="fas fa-times"></i></a>
					</div>
				</div>
			</div>
			<hr>
		@endif

        <h6>
			<a href="/cours/{{ $course->id }}" class="tip" data-toggle="tooltip" data-placement="top" title="Retour à la description du cours">{{ $course->name }}</a>
		</h6>
        <h1 id="chapterName">{{ $chapter->order_id }}. {{ $chapter->name }}</h1>

		<!-- Create toolbar container -->
		<div id="toolbar"></div>
		<!-- Create the editor container -->
		<div id="edit" class="editor">{!! $part->body !!}</div>
	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
