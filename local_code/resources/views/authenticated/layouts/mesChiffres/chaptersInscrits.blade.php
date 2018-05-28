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
		@for ($i=0; $i < 3; $i++)
			<td class="text-right">-</td>
		@endfor
	@else
		<td class="text-center">
			@if ($chapter->isPassed())
				Réussis <i class="fas fa-graduation-cap passed"></i>
			@elseif ($chapter->isTested())
				Raté <i class="fas fa-times failed"></i>
			@endif
		</td>
		<td class="text-right">{{ $chapter->getResult(false) }} %</td>
		<td class="text-right">{{ $chapter->getResult(true) }} %</td>
		<td class="text-right">{{ $chapter->getTestNumber() }}</td>
	@endif
</tr>
