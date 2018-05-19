@extends('layouts.auth')

@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <link href="{{ asset('css/firaCode.css') }}" rel="stylesheet">
	<link href="{{ asset('css/alert.css') }}" rel="stylesheet">
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

		.ql-toolbar {
			border-radius: 20px 20px 0 0;
		}

		.ql-container {
			border-radius: 0 0 20px 20px;
		}

		.ql-container,
		.ql-editor {
			height: auto;
		}
	</style>
    <link href="{{ asset('css/courseContent.css') }}" rel="stylesheet">
	<link href="{{ asset('css/highlightStyles/monokai-sublime.css') }}" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

<title>{{ $course->name }}</title>

@section('content')
	@if (session('message'))
		@if (strpos(session('message'), 'succès' ) !== false)
			@php ($alertType = "alert-success")
			@php ($icon = "fas fa-check")
		@else
			@php ($alertType = "alert-danger")
			@php ($icon = "fas fa-times")
		@endif
		<div class="alert alert-dismissible {{ $alertType }}">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p><i class="{{ $icon }}"></i> {{ session('message') }}</p>
		</div>
	@endif

    @include('authenticated.layouts.edit.edition')
@endsection

@push('js')
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
		var icons = Quill.import('ui/icons');
		icons.header[3] = `
<svg viewBox="0 0 18 18"> <path class="ql-fill" d="M11.849,14.214c-0.088,-0.137 -0.14,-0.279 -0.156,-0.428c-0.017,-0.149 0.004,-0.285 0.06,-0.41c0.056,-0.124 0.146,-0.223 0.271,-0.295c0.124,-0.072 0.275,-0.1 0.452,-0.084c0.193,0.016 0.357,0.082 0.494,0.199c0.136,0.116 0.275,0.225 0.416,0.325c0.14,0.1 0.291,0.169 0.452,0.205c0.16,0.036 0.357,-0.018 0.59,-0.163c0.056,-0.04 0.104,-0.082 0.145,-0.126c0.04,-0.045 0.08,-0.091 0.12,-0.139c0.048,-0.064 0.084,-0.119 0.109,-0.163c0.024,-0.044 0.048,-0.102 0.072,-0.174c0.048,-0.137 0.08,-0.266 0.096,-0.386c0.016,-0.121 0.016,-0.249 0,-0.386c-0.12,-0.225 -0.271,-0.373 -0.452,-0.446c-0.18,-0.072 -0.369,-0.118 -0.566,-0.138c-0.197,-0.02 -0.392,-0.042 -0.584,-0.066c-0.193,-0.024 -0.358,-0.097 -0.495,-0.217c-0.12,-0.105 -0.194,-0.225 -0.222,-0.362c-0.029,-0.136 -0.021,-0.267 0.024,-0.391c0.044,-0.125 0.12,-0.235 0.229,-0.332c0.108,-0.096 0.239,-0.156 0.391,-0.181c0.121,-0.024 0.251,-0.046 0.392,-0.066c0.14,-0.02 0.275,-0.052 0.404,-0.096c0.128,-0.044 0.249,-0.103 0.361,-0.175c0.113,-0.072 0.205,-0.169 0.277,-0.289c0.008,-0.089 0.01,-0.175 0.006,-0.259c-0.004,-0.085 -0.026,-0.167 -0.066,-0.247c-0.08,-0.073 -0.195,-0.123 -0.343,-0.151c-0.149,-0.028 -0.306,-0.04 -0.47,-0.036c-0.165,0.004 -0.32,0.022 -0.464,0.054c-0.145,0.032 -0.261,0.068 -0.35,0.109c-0.193,0.192 -0.389,0.283 -0.59,0.271c-0.201,-0.012 -0.37,-0.083 -0.506,-0.211c-0.137,-0.129 -0.221,-0.289 -0.253,-0.482c-0.033,-0.193 0.024,-0.366 0.168,-0.518c0.113,-0.129 0.239,-0.231 0.38,-0.308c0.14,-0.076 0.295,-0.138 0.464,-0.186c0.409,-0.113 0.837,-0.171 1.283,-0.175c0.446,-0.004 0.862,0.094 1.247,0.295c0.314,0.161 0.549,0.374 0.705,0.639c0.157,0.265 0.245,0.546 0.265,0.843c0.02,0.298 -0.026,0.593 -0.138,0.886c-0.113,0.293 -0.285,0.552 -0.518,0.777c0.289,0.201 0.508,0.432 0.656,0.693c0.149,0.261 0.241,0.53 0.278,0.808c0.036,0.277 0.02,0.558 -0.049,0.843c-0.068,0.285 -0.182,0.552 -0.343,0.801c-0.161,0.249 -0.36,0.476 -0.597,0.681c-0.237,0.205 -0.504,0.368 -0.801,0.488c-0.257,0.105 -0.51,0.153 -0.759,0.145c-0.249,-0.008 -0.492,-0.052 -0.729,-0.133c-0.237,-0.08 -0.466,-0.19 -0.687,-0.331c-0.221,-0.141 -0.428,-0.295 -0.621,-0.464l-0.048,-0.048Zm-8.849,-4.214l0,4c0,0.549 -0.451,1 -1,1c-0.549,0 -1,-0.451 -1,-1l0,-10c0,-0.549 0.451,-1 1,-1c0.549,0 1,0.451 1,1l0,4l5,0l0,-4c0,-0.549 0.451,-1 1,-1c0.547,0 0.998,0.449 1,1l0,10c0,0.549 -0.451,1 -1,1c-0.549,0 -1,-0.451 -1,-1l0,-4l-5,0Z"></path> </svg>`
	icons.header[4] = `
<svg viewBox="0 0 18 18"> <path class="ql-fill" d="M15.079,15.254c-0.067,0.006 -0.135,0 -0.204,-0.017c-0.138,-0.036 -0.258,-0.132 -0.361,-0.29c-0.063,-0.103 -0.106,-0.221 -0.13,-0.355c-0.023,-0.134 -0.037,-0.274 -0.041,-0.42c-0.004,-0.145 -0.002,-0.285 0.006,-0.419c0.008,-0.134 0.008,-0.252 0,-0.355c-0.3,0 -0.607,-0.002 -0.922,-0.006c-0.316,-0.004 -0.623,-0.01 -0.923,-0.018c-0.094,0 -0.193,0 -0.295,0c-0.103,0 -0.203,-0.009 -0.302,-0.029c-0.098,-0.02 -0.191,-0.051 -0.278,-0.095c-0.086,-0.043 -0.161,-0.108 -0.224,-0.195c-0.103,-0.15 -0.144,-0.305 -0.124,-0.467c0.019,-0.161 0.067,-0.321 0.142,-0.479c0.074,-0.157 0.163,-0.307 0.266,-0.449c0.102,-0.142 0.181,-0.264 0.236,-0.366c0.205,-0.371 0.416,-0.735 0.633,-1.094c0.216,-0.359 0.427,-0.719 0.632,-1.082c0.063,-0.11 0.13,-0.236 0.201,-0.378c0.071,-0.142 0.144,-0.284 0.219,-0.426c0.075,-0.142 0.155,-0.278 0.242,-0.408c0.087,-0.13 0.178,-0.242 0.272,-0.337c0.118,-0.11 0.244,-0.177 0.378,-0.201c0.134,-0.023 0.261,-0.011 0.379,0.036c0.118,0.047 0.22,0.124 0.307,0.23c0.087,0.107 0.138,0.239 0.154,0.396c0.008,0.095 -0.012,0.201 -0.059,0.32c-0.048,0.118 -0.103,0.234 -0.166,0.348c-0.063,0.115 -0.126,0.217 -0.189,0.308c-0.063,0.09 -0.106,0.156 -0.13,0.195c-0.11,0.197 -0.221,0.39 -0.331,0.579c-0.11,0.189 -0.221,0.379 -0.331,0.568c-0.15,0.268 -0.3,0.532 -0.449,0.792c-0.15,0.26 -0.304,0.52 -0.461,0.78c0.197,0.016 0.384,0.024 0.561,0.024c0.177,0 0.357,0 0.538,0c0.008,-0.213 0.008,-0.424 0,-0.633c-0.008,-0.209 0.012,-0.412 0.059,-0.609c0.04,-0.165 0.124,-0.293 0.254,-0.384c0.13,-0.09 0.27,-0.14 0.42,-0.148c0.15,-0.007 0.29,0.026 0.42,0.101c0.13,0.075 0.219,0.199 0.266,0.372c0.031,0.119 0.051,0.243 0.059,0.373c0.008,0.13 0.01,0.258 0.006,0.384c-0.004,0.126 -0.008,0.238 -0.012,0.337c-0.004,0.098 -0.006,0.171 -0.006,0.219c0.103,0 0.199,-0.006 0.29,-0.018c0.09,-0.012 0.183,0.002 0.278,0.041c0.118,0.048 0.226,0.117 0.325,0.207c0.098,0.091 0.171,0.191 0.219,0.302c0.047,0.11 0.061,0.224 0.041,0.343c-0.02,0.118 -0.089,0.232 -0.207,0.342c-0.142,0.134 -0.288,0.209 -0.437,0.225c-0.15,0.016 -0.32,0.024 -0.509,0.024l0,1.064c-0.016,0.165 -0.073,0.311 -0.171,0.437c-0.099,0.126 -0.213,0.219 -0.343,0.278c-0.065,0.03 -0.131,0.047 -0.198,0.053Zm-12.079,-5.254l0,4c0,0.549 -0.451,1 -1,1c-0.549,0 -1,-0.451 -1,-1l0,-10c0,-0.549 0.451,-1 1,-1c0.549,0 1,0.451 1,1l0,4l5,0l0,-4c0,-0.549 0.451,-1 1,-1c0.547,0 0.997,0.448 1,1l0,10c0,0.549 -0.451,1 -1,1c-0.549,0 -1,-0.451 -1,-1l0,-4l-5,0Z"></path> </svg>`
		var toolbarOptions = [
			['bold', 'italic', 'underline', 'strike'],        // toggled buttons
			['blockquote', 'code-block'],

			[{ 'header': 3 }, { 'header': 4 }],               // custom button values
			[{ 'header': [3, 4, 5, 6, false] }],
			[{ 'list': 'ordered'}, { 'list': 'bullet' }],
			//[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
			[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

			[{ 'color': [] }],          // dropdown with defaults from theme
			[{ 'align': [] }],

			['clean']                                         // remove formatting button
		];
		var options = {
			debug: 'info',
			modules: {
				syntax: true,              // Include syntax module
				toolbar: toolbarOptions
			},
			theme: 'snow'
		};
		var editor = new Quill('.editor', options);
	</script>
	<script>
		$(document).on('click', '#save', function() {
			saveChanges();
		});

		function saveChanges() {
			var newData = { html: $('.ql-editor').html(), part: {{ $part->id }} };

			$.post({
				url: '/editer/sauver',
				data: newData,
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				success: (data) => {
					console.log(data);
					window.location = "/cours/{{ $course->id }}/{{ $chapter->id }}?part={{ $part->order_id }}";
				},
				error : (resultat, statut, erreur) => {
					console.log(erreur);
				}
			});
			console.log(newData.html);
		}
	</script>
@endpush
