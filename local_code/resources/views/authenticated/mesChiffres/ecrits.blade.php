@extends('layouts.auth')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mesChiffres.css') }}">
@endpush

@section('title', 'Écrits')

@section('content')
    <h1>Chiffres pour vos cours.</h1>

    <div class="container">
		@if (!Auth::user()->isATutor())
			<div class="row">
				@include('authenticated.layouts.vide')
			</div>
		@else
	        @include('authenticated.layouts.mesChiffres.statisticsBarWritten')
        	<div class="row">
	            <div id="jumbotronTitle" class="text-center">
	                <h2>Détails</h2>
	            </div>

	            <div class="table-responsive jumbotron">
	                <table id="coursesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	                    <thead class="text-center">
	                        <tr>
	                            <th scope="col">Cours</th>
	                            <th scope="col">Statut</th>
	                            <th scope="col">Participants</th>
	                            <th scope="col">Résultat</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							@foreach (App\Course::getAllWrittenCourses() as $courseId)
								@include('authenticated.layouts.mesChiffres.writtenCourses')
			                @endforeach
	                    </tbody>
	                </table>
	            </div>
	        </div>
        @endif
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/Bootstrap/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/Bootstrap/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#coursesTable').DataTable();
        });
    </script>
@endpush
