<tr>
	@php($course = App\Course::where('id', $courseId)->first())
	<td>
		{{ $course->name }}
		@if ($course->isPublished() && $course->isTested())
			<a class="chapterLink" href="/chiffresinscrits/chapitre/{{ $courseId }}" title="Voir par chapitres"><i class="far fa-eye"></i><i class="fas fa-eye"></i></a>
		@else
			<i class="far fa-eye-slash inactiveEye" title="Ce chapitre n'a aucune donnée supplémentaire."></i>
		@endif
	</td>
	<td class="text-center">
		@if ($course->isCompleted())
			Réussis <i class="fas fa-graduation-cap passed"></i>
		@elseif ($course->isTested())
			En cours <i class="fas fa-hourglass-half pending"></i>
		@else
			En attente <i class="fas fa-spinner waiting"></i>
		@endif
	</td>
	<td class="text-right">
		@if ($course->isTested())
			{{ $course->getAverage(false) }} %
		@else
			-
		@endif
	</td>
</tr>
