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
    return view('authenticated.cours');
})->middleware('auth');

Route::get('/ecrire', function() {
    return view('authenticated.ecrire');
})->middleware('auth');

Route::get('/compte', 'UserController@index');
Route::post('/majnames', 'UserController@updateNames');
Route::post('/majemail', 'UserController@updateEmail');
Route::post('/majmdp', 'UserController@updatePassword');

/* Mes cours */

Route::get('/coursinscrits', function() {
    return view('authenticated.mesCours.inscrits');
})->middleware('auth');

Route::get('/favoris', function() {
    return view('authenticated.mesCours.favoris');
})->middleware('auth');

Route::get('/encours', function() {
    return view('authenticated.mesCours.encours');
})->middleware('auth');

Route::get('/coursecrits', function() {
    return view('authenticated.mesCours.ecrits');
})->middleware('auth');

/* Mes chiffres */

Route::get('/chiffresinscrits', function() {
    return view('authenticated.mesChiffres.inscrits');
})->middleware('auth');

Route::get('/chiffresecrits', function() {
    return view('authenticated.mesChiffres.ecrits');
})->middleware('auth');
