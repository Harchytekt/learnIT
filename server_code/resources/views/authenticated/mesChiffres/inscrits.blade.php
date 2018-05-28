@extends('layouts.auth')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mesChiffres.css') }}">
@endpush

@section('title', 'Inscrits')

@section('content')
    <h1>Chiffres pour vos inscriptions.</h1>

    <div class="container">
        @include('authenticated.layouts.mesChiffres.statisticsBarInscrits')
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
                            <th scope="col">Résultat</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach (App\Enrollment::getAllEnrollments() as $courseId)
							@include('authenticated.layouts.mesChiffres.coursesInscrit')
		                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
