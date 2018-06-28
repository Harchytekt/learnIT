@extends('layouts.auth')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mesChiffres.css') }}">
@endpush

@section('title', 'Inscrits-Chapitres')

@section('content')
    <h1>Chiffres pour vos inscriptions par chapitres.</h1>

    <div class="container">
        @include('authenticated.layouts.mesChiffres.barreStatsEcrits')
        <div class="row">
            <div id="jumbotronTitle" class="text-center">
                <h2>Détails</h2>
                <a href="/chiffresecrits"><i class="fas fa-undo"></i> Retour vers le cours</a>
            </div>

            <div class="table-responsive jumbotron">
                <table id="coursesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Chapitre</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Résultat</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($course->getAllChapters() as $chapter)
							@include('authenticated.layouts.mesChiffres.chapitresEcrits')
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

    <script>
        $(document).ready(function() {
            $('#coursesTable').DataTable();
        });
    </script>
@endpush
