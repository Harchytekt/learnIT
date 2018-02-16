@extends('layouts.auth')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/dataTables.bootstrap4.min.css') }}">
    <style media="screen">
    </style>
@endpush

@push('js')
    <script src="{{ asset('js/Bootstrap/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/Bootstrap/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#coursesTable').DataTable();
        });
    </script>
@endpush

@section('title', 'Inscrits-Chapitres')

@section('content')
    <h1>Chiffres pour vos inscriptions par chapitres.</h1>

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-2" style="margin-bottom: 45px;">
                <div style="background-color: #FFFFE5; border-radius: 1000px; text-align: center; height: 150px; width: 150px; margin: 0 auto;">
                    <h2 style="font-size: 4rem; line-height: 130px;">4</h2>
                    <p style="position: relative; top: -40px;">cours suivis</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-2" style="margin-bottom: 45px;">
                <div style="background-color: #FFFFE5; border-radius: 1000px; text-align: center; height: 150px; width: 150px; margin: 0 auto;">
                    <h2 style="font-size: 4rem; line-height: 130px;">1</h2>
                    <p style="position: relative; top: -40px;">cours réussis</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-2" style="margin-bottom: 45px;">
                <div style="background-color: #FFFFE5; border-radius: 1000px; text-align: center; height: 150px; width: 150px; margin: 0 auto;">
                    <h2 style="font-size: 4rem; line-height: 130px;">3</h2>
                    <p style="position: relative; top: -40px;">chapitres réussis</p>
                </div>
            </div>
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-2" style="margin-bottom: 45px;">
                <div style="background-color: #FFFFE5; border-radius: 1000px; text-align: center; height: 150px; width: 150px; margin: 0 auto;">
                    <h2 style="display: inline; font-size: 4rem; line-height: 130px;">85</h2> <h4 style="display: inline;">%</h4>
                    <p style="position: relative; top: -40px;">de moyenne</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="color: #FFF; width: 100%; text-align: center;">
                <h2>Détails</h2>
                <a href="/chiffresinscrits" style="color: #FFF;"><i class="fas fa-undo"></i> Retour vers le cours</a>
            </div>

            <div class="table-responsive jumbotron" style="background-color: rgba(255, 255, 255, 0.80);">
                <table id="coursesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col">Chapitre</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Résultat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chapitre 1</td>
                            <td style="text-align: center;">Réussis <i class="fas fa-graduation-cap" style="color: #2AB77E;"></i></td>
                            <td style="text-align: right;">80 %</td>
                        </tr>
                        <tr>
                            <td>Chapitre 2</td>
                            <td style="text-align: center;">Réussis <i class="fas fa-graduation-cap" style="color: #2AB77E;"></i></td>
                            <td style="text-align: right;">90 %</td>
                        </tr>
                        <tr>
                            <td>Chapitre 3</td>
                            <td style="text-align: center;">En cours <i class="fas fa-hourglass-half" style="color: #00AAFF;"></i></td>
                            <td style="text-align: right;">-</td>
                        </tr>
                        <tr>
                            <td>Chapitre 4</td>
                            <td style="text-align: center;">Raté <i class="fas fa-times" style="color: #DC3545;"></i></td>
                            <td style="text-align: right;">45 %</td>
                        </tr>
                        <tr>
                            <td>Chapitre 5</td>
                            <td style="text-align: center;">En attente <i class="fas fa-spinner" style="color: #FCDB69;"></i></td>
                            <td style="text-align: right;">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
