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

/* Accueil */

Route::get('/accueil', 'HomeController@index')->name('accueil');

/* Logged in */

Route::get('/cours', 'CourseController@index');

Route::get('/ecrire', function() {
    return view('authenticated.ecrire');
})->middleware('auth');

Route::get('/compte', 'UserController@index');
Route::post('/majnames', 'UserController@updateNames');
Route::post('/majemail', 'UserController@updateEmail');
Route::post('/majmdp', 'UserController@updatePassword');
Route::get('/supprimercompte', 'UserController@destroy');

/* Mes cours */

Route::get('/coursinscrits', 'CourseController@showEnrollments');
Route::get('/favoris', 'CourseController@showFavorites');
Route::get('/encours', 'CourseController@showInProgress');
Route::get('/cours/{course}', 'CourseController@show');
Route::get('/cours/{course}/{chapter}', 'ChapterController@show');

Route::post('/cours/{course}/commentaires', 'CommentController@store');

Route::get('/coursecrits', function() {
    return view('authenticated.mesCours.ecrits');
})->middleware('auth');

/* Mes chiffres */

Route::get('/chiffresinscrits', function() {
    return view('authenticated.mesChiffres.inscrits');
})->middleware('auth');

Route::get('/chiffreschapters', function() {
    return view('authenticated.mesChiffres.chapters');
})->middleware('auth');

Route::get('/chiffresecrits', function() {
    return view('authenticated.mesChiffres.ecrits');
})->middleware('auth');
