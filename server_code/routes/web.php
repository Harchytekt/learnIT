<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenue');
});

Auth::routes();


Route::get('/accueil', 'HomeController@index')->name('accueil');

/* Logged in */

Route::get('/cours', function() {
    return view('cours');
});

Route::get('/ecrire', function() {
    return view('ecrire');
});

Route::get('/compte', function() {
    return view('compte');
});

/* Mes cours */

Route::get('/coursinscrits', function() {
    return view('mesCours.inscrits');
});

Route::get('/favoris', function() {
    return view('mesCours.favoris');
});

Route::get('/encours', function() {
    return view('mesCours.encours');
});

Route::get('/coursecrits', function() {
    return view('mesCours.ecrits');
});

/* Mes chiffres */

Route::get('/chiffresinscrits', function() {
    return view('mesChiffres.inscrits');
});

Route::get('/chiffresecrits', function() {
    return view('mesChiffres.ecrits');
});
