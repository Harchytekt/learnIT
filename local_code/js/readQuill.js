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
	//editor.enable(false);
	if ($('.active').length != 0) {
		editor = new Quill('.active .editor', options);
		//editor.enable(true);
	} else {
		editor = new Quill('.editor', options);
		//editor.enable(true);
	}
});
