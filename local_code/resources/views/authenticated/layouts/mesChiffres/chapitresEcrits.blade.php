<tr>
	<td>{{ $chapter->id }}. {{ $chapter->name }}</td>
	@if ($chapter->id == 1 || !$chapter->isPublished() || !$chapter->isTested())
		<td class="text-center">
			@if ($chapter->id == 1)
				Débloqué par défaut
			@elseif (!$chapter->isPublished())
				Non publié <i class="fas fa-pencil-alt unpublished"></i>
			@elseif (!$chapter->isTested())
				En attente <i class="fas fa-spinner waiting"></i>
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
