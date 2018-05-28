<tr>
	@php($course = App\Course::where('id', $courseId)->first())
	<td>{{ $course->name }} <a href="/chiffresinscrits/chapters/{{ $courseId }}" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
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
