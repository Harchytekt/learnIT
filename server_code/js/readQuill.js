/* jshint esversion: 6 */

var options = {
	//debug: 'info',
	modules: {
		syntax: true,              // Include syntax module
		toolbar: false
	},
	readOnly: true,
	theme: 'snow'
};

// Init Quill editor
var editor;
$(document).ready(function() {
	if ($('.editor').length != 0) {
		editor = new Quill('.editor', options);
	}
});
