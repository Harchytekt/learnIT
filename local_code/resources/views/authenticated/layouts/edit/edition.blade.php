<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div style="padding: 20px">
		@if ($course->userIsTutor())
			<div class="inner">
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<a href="" class="btn btn-warning" title="Éditer le chapitre"><i class="fas fa-edit"></i> Save</a>
					</div>
					<div class="btn-group mr-2" role="group" aria-label="Second group">
						<a href="/cours/{{ $course->id }}/{{ $chapter->id }}?part={{ $part->order_id }}" class="btn btn-success" title="Ajouter une partie"><i class="fas fa-plus"></i> Cancel</a>
					</div>
				</div>
			</div>
			<hr>
		@endif

        <h6>
			<a href="/cours/{{ $course->id }}" class="tip" data-toggle="tooltip" data-placement="top" title="Retour à la description du cours">{{ $course->name }}</a>
		</h6>
        <h1 style="text-align: center; padding-bottom: 20px;">{{ $chapter->order_id }}. {{ $chapter->name }}</h1>

        <div class="pagination-container">{!! $part->body !!}</div>
		<!-- entities escape  -->
	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
