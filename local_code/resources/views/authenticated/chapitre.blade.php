@extends('layouts.auth')

@push('styles')
	<link href="{{ asset('css/course.css') }}" rel="stylesheet">
	<link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<style media="screen">
		.editor {
			font-family: 'Fira Code' !important;
			font-size: 1rem;
			line-height: 1.5
		}

		.editor .ql-editor h3,
		.editor .ql-editor h4,
		.editor .ql-editor h5,
		.editor .ql-editor h6 {
			margin-bottom: 0.5rem;
			font-weight: 500;
			line-height: 1.2;

		}

		.editor .ql-editor h3 {
			font-size: 1.75rem;
		}

		.editor .ql-editor h4 {
			font-size: 1.5rem;
		}

		.editor .ql-editor h5 {
			font-size: 1.25rem;
		}

		.editor .ql-editor h6 {
			font-size: 1rem;
		}

		.editor .ql-editor blockquote {
		    margin             : 10px 0 10px 50px;
		    padding-left       : 15px;
		    border-left        : 3px solid #FDDC5F;
		    font-style         : italic;
		    color              : #808080;
		}

		.ql-container {
			border-radius: 20px;
		}

		.ql-container,
		.ql-editor {
			height: auto;
		}

		#pageNav {
			margin-top: 20px;
		}
	</style>
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/monokai-sublime.css') }}" rel="stylesheet">
@endpush

<title>{{ $chapter->name }}</title>

@section('content')
    @include('authenticated.layouts.chapter')
@endsection

@push('js')
    <script src="{{ asset('js/chapitre.js') }}"></script>
    <script src="{{ asset('js/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<!-- Initialize Quill editor -->
	<script>
		hljs.configure({
			tabReplace: '    ', // 4 spaces
			languages: ['python']
		});
		var options = {
			debug: 'info',
			modules: {
				syntax: true,              // Include syntax module
				toolbar: false
			},
			readOnly: true,
			theme: 'snow'
		};
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
	</script>
@endpush
