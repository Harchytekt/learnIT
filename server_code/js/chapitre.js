/* jshint esversion: 6 */

/**
 * This function is used to get the navigation bar
 * of the current part of the chapter.
 *
 * @param courseId
 *		The ID of the current course.
 * @param chapterId
 *		The ID of the current chapter.
 * @param partOrderId
 *		The order ID of the current part.
 * @param maxPartNb
 *		The number of parts of the chapter.
 */
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

// Add the event of the button to add a new part of the chapter.
$(document).on('click', "#addnewPart", function() {
	window.location.href = `/nouvellePartie/${ chapterId }/${ $(`#typeOfPart`).val() }`;
});
