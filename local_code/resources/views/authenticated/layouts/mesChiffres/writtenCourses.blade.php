<tr>
	@php($course = App\Course::where('id', $courseId)->first())
	<td>
		{{ $course->name }}
		@if ($course->isPublished() && $course->isTested())
			<a class="chapterLink" href="/chiffresecrits/chapters/{{ $courseId }}" title="Voir par chapitres"><i class="far fa-eye"></i><i class="fas fa-eye"></i></a>
		@else
			<i class="far fa-eye-slash inactiveEye" title="Ce chapitre n'a aucune donnée supplémentaire."></i>
		@endif
	</td>
	@if ($course->isPublished())
		<td class="text-center">Publié <i class="fas fa-cloud passed"></i></td>
		<td class="text-right">
			{{ $course->getStudentsNumber() }}
		</td>
		<td class="text-right">
			@if ($course->isTested())
				{{ $course->getAverage(true) }} %
			@else
				-
			@endif
		</td>
	@else
		<td class="text-center">Non publié <i class="fas fa-pencil-alt unpublished"></i></td>
		<td class="text-right">-</td>
		<td class="text-right">-</td>
	@endif
</tr>
