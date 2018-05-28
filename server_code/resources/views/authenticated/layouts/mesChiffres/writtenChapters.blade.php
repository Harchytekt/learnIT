<tr>
	<td>{{ $chapter->id }}. {{ $chapter->name }}</td>
	@if ($chapter->id == 1 || !$chapter->isPublished() || !$chapter->isTested())
		<td class="text-center">
			@if ($chapter->id == 1)
				Débloqué par défaut
			@elseif (!$chapter->isPublished())
				Non publié <i class="fas fa-pencil-alt unpublished"></i>
			@endif
		</td>
		<td class="text-right">-</td>
	@else
		<td class="text-center">
			Publié <i class="fas fa-cloud passed"></i>
		</td>
		<td class="text-right">{{ $chapter->getAllResults() }} %</td>
	@endif
</tr>
