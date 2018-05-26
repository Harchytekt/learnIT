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

@section('title', 'Inscrits')

@section('content')
    <h1>Chiffres pour vos inscriptions.</h1>

    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-10 offset-1 col-md-5 col-lg-4 col-xl-2" style="margin-bottom: 45px;">
                <div style="background-color: #FFFFE5; border-radius: 1000px; text-align: center; height: 150px; width: 150px; margin: 0 auto;">
                    <h2 style="font-size: 4rem; line-height: 130px;">{{ App\Enrollment::numberOfEnrollments() }}</h2>
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
            </div>

            <div class="table-responsive jumbotron" style="background-color: rgba(255, 255, 255, 0.80); padding: 2rem 0;">
                <table id="coursesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col">Cours</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Résultat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Concevez un site avec Flask <a href="/chiffreschapters" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
                            <td style="text-align: center;">En cours <i class="fas fa-hourglass-half"></i></td>
                            <td style="text-align: right;">-</td>
                        </tr>
                        <tr>
                            <td>Découvrez la programmation orientée objet avec Python <a href="/chiffreschapters" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
                            <td style="text-align: center;">Réussis <i class="fas fa-graduation-cap"></i></td>
                            <td style="text-align: right;">90 %</td>
                        </tr>
                        <tr>
                            <td>Découvrez le framework Django <a href="/chiffreschapters" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
                            <td style="text-align: center;">En cours <i class="fas fa-hourglass-half"></i></td>
                            <td style="text-align: right;">-</td>
                        </tr>
                        <tr>
                            <td>Découvrez le framework PHP Laravel <a href="/chiffreschapters" title="Voir par chapitres"><i class="fas fa-eye"></i></a></td>
                            <td style="text-align: center;">En cours <i class="fas fa-hourglass-half"></i></td>
                            <td style="text-align: right;">80 %</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
