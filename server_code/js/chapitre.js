/* jshint esversion: 6 */

// **************** ID detection ********************
// https://stackoverflow.com/questions/404891/how-to-pass-values-from-one-page-to-another-in-jquery#404894
var qsParm = [];
var parms = window.location.search.substring(1).split(`&`);
for (var i=0; i < parms.length; i++) {
    var pos = parms[i].indexOf(`=`);
    if (pos > 0) {
        var key = parms[i].substring(0, pos);
        var val = parms[i].substring(pos + 1);
        if (key == `part`) {
            qsParm[key] = val;
        }
    }
}
// **************************************************

if (qsParm.part === undefined ||
    (Math.floor(qsParm.part) != qsParm.part) || !$.isNumeric(qsParm.part)) {
    window.location.href = `?part=1`;
}
var part = parseInt(qsParm.part), nbParts = $(`.part`).length;
part = (part < 1 || part > maxPart) ? 1 : part;
var previous = (part == 1) ? 0 : (part - 1), next = (part == nbParts) ? 0 : (part + 1);
var previousState, nextState;
if (previous == 0) {
    previousState = `disabled`;
}
if (next == 0) {
    nextState = `disabled`;
}


$(`.tip`).tooltip();

$(document).ready(function() {
    if (nbParts > 0) {
        var nav = `<nav aria-label="Navigation" id="pageNav"><ul class="pagination justify-content-center">`;
        nav += `<li class="page-item ${ previousState }"><a class="page-link" href="?part=1" tabindex="-1"><i class="fas fa-angle-double-left fa-lg"></i><span class="sr-only">Début</span></a></li>`;
        nav += `<li class="page-item ${ previousState }"><a class="page-link" href="?part=${ previous }" tabindex="-1"><i class="fas fa-angle-left fa-lg"></i><span class="sr-only">Précédent</span></a></li>`;

        for (var i = 1; i <= nbParts; i++) {
            nav += `<li class="page-item `;
            if (i == part) {
                nav += `active`;
            }
            nav += `"><a class="page-link" href="?part=${ i }">${ i }</a></li>`;
        }

        nav += `<li class="page-item ${ nextState }"><a class="page-link" href="?part=${ next }"><i class="fas fa-angle-right fa-lg"></i><span class="sr-only">Suivant</span></a></li>`;
        nav += `<li class="page-item ${ nextState }"><a class="page-link" href="?part=${ nbParts }"><i class="fas fa-angle-double-right fa-lg"></i><span class="sr-only">Fin</span></a></li></ul></nav>`;

        $(`.pagination-container`).append(nav);

        if (part != 1) {
            $(`.active.part`).addClass(`inactive`);
            $(`.active.part`).removeClass(`active`);
            $(`#${ part }`).removeClass(`inactive`);
            $(`#${ part }`).addClass(`active`);
        }
    }
});
