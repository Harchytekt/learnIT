/* jshint esversion: 6 */

$(document).ready(function() {
    // Get current pathname and assign 'active' class to the correct link
    var path = window.location.pathname;
    $(`.navbar-nav > li`).removeClass(`active`);
    $(`.dropdown-item`).removeClass(`active`);
    $(`a[href="${ path }"].dropdown-item`).addClass(`active`);
    if (path == `/coursinscrits` || path == `/favoris` || path == `/encours` || path == `/coursecrits`) {
        path = `/mescours`;
    } else if (path == `/chiffresinscrits` || path == `/chiffresecrits`) {
        path = `/chiffres`;
    }
    $(`.navbar-nav > li a[href="${ path }"]`).parent().addClass(`active`);
});
