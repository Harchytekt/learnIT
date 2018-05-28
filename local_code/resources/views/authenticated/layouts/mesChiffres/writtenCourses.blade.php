<tr>
	@php($course = App\Course::where('id', $courseId)->first())
	<td>{{ $course->name }} <a href="/chiffresecrits/chapters/{{ $courseId }}" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
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
		<td class="text-center">En attente <i class="fas fa-spinner waiting"></i></td>
		<td class="text-right">-</td>
		<td class="text-right">-</td>
	@endif
</tr>
