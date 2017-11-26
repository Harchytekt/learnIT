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
})->middleware('auth');

Route::get('/ecrire', function() {
    return view('ecrire');
})->middleware('auth');

Route::get('/compte', function() {
    return view('compte');
})->middleware('auth');

/* Mes cours */

Route::get('/coursinscrits', function() {
    return view('mesCours.inscrits');
})->middleware('auth');

Route::get('/favoris', function() {
    return view('mesCours.favoris');
})->middleware('auth');

Route::get('/encours', function() {
    return view('mesCours.encours');
})->middleware('auth');

Route::get('/coursecrits', function() {
    return view('mesCours.ecrits');
})->middleware('auth');

/* Mes chiffres */

Route::get('/chiffresinscrits', function() {
    return view('mesChiffres.inscrits');
})->middleware('auth');

Route::get('/chiffresecrits', function() {
    return view('mesChiffres.ecrits');
})->middleware('auth');
