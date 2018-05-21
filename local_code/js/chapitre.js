/* jshint esversion: 6 */

function getNav(courseId, chapterId, partOrderId, maxPartNb) {
	var url = `/cours/${ courseId }/${ chapterId }`;
	var res = `<ul class="pagination justify-content-center">
		<li class="page-item ${ (partOrderId == 1) ? "disabled" : "" }">
			<a class="page-link" href="${ url }/1" tabindex="-1">
				<i class="fas fa-angle-double-left fa-lg"></i>
				<span class="sr-only">Début</span>
			</a>
		</li>
		<li class="page-item ${ (partOrderId == 1) ? "disabled" : "" }">
			<a class="page-link" href="${ url }/${ partOrderId - 1 }" tabindex="-1">
				<i class="fas fa-angle-left fa-lg"></i>
				<span class="sr-only">Précédent</span>
			</a>
		</li>`;

	for (let i = 1; i <= maxPartNb; i++) {
		res += `<li class="page-item ${ (partOrderId == i) ? "active" : "" }">
			<a class="page-link" href="${ url }/${ i }">${ i }</a>
		</li>`;
	}

	res += `<li class="page-item ${ (partOrderId == maxPartNb) ? "disabled" : "" }">
			<a class="page-link" href="${ url }/${ partOrderId + 1 }">
				<i class="fas fa-angle-right fa-lg"></i>
				<span class="sr-only">Suivant</span>
			</a>
		</li>
		<li class="page-item ${ (partOrderId == maxPartNb) ? "disabled" : "" }">
			<a class="page-link" href="${ url }/${ maxPartNb }">
				<i class="fas fa-angle-double-right fa-lg"></i>
				<span class="sr-only">Fin</span>
			</a>
		</li>
	</ul>`;

	$(`#pageNav`).html(res);
}
