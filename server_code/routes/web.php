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

Route::get('/humans', function() { return Redirect::to('humans.txt'); });

Auth::routes();

/* Accueil */

Route::get('/accueil', 'HomeController@index')->name('accueil');

/* Logged in */

Route::get('/cours', 'CourseController@index');

Route::get('/compte', 'UserController@index');
Route::post('/majnames', 'UserController@updateNames');
Route::post('/majemail', 'UserController@updateEmail');
Route::post('/majmdp', 'UserController@updatePassword');
Route::get('/supprimercompte', 'UserController@destroy');
Route::post('/importUsers', 'UserController@storeUsersList');
Route::get('/importUsers/aide', 'UserController@help');


/* Mes cours */

Route::get('/coursinscrits', 'CourseController@showEnrollments');
Route::get('/coursinscrits/{course}', 'CourseController@changeEnrollmentState');
Route::get('/favoris', 'CourseController@showFavorites');
Route::get('/favoris/{course}', 'CourseController@changeFavoriteState');
Route::get('/encours', 'CourseController@showInProgress');
Route::get('/cours/{course}', 'CourseController@show');
Route::get('/cours/{course}/{chapter}', 'ChapterController@showFirstPart');
Route::get('/cours/{course}/{chapter}/{part}', 'ChapterController@show');

Route::post('/cours/{course}/commentaires', 'CommentController@store');
Route::get('/coursecrits', 'CourseController@showWritten');
Route::get('/publier/cours/{course}', 'CourseController@publish');
Route::get('/publier/chapitre/{chapter}', 'ChapterController@publish');
Route::get('/terminer/cours/{course}', 'CourseController@finish');

/* Mes chiffres */

Route::get('/chiffresinscrits', 'StatisticsCourseController@showCoursesList');
Route::get('/chiffresinscrits/chapitre/{course}', 'StatisticsCourseController@showChaptersList');
Route::get('/chiffresecrits', 'StatisticsCourseController@showWrittenCoursesList');
Route::get('/chiffresecrits/chapitre/{course}', 'StatisticsCourseController@showWrittenChaptersList');

/* Ecrire */

Route::get('/ecrire', 'CourseController@showUnpublishedCourses');

Route::get('/ecrireNouveau', 'CourseController@initCourse');
Route::post('/ajouterTitreCours', 'CourseController@courseInitialization');
Route::get('/edit/{course}', 'EditCourseController@show');
Route::get('/edit/{course}/{chapter}', 'EditChapterController@show');
Route::get('/nouveauChapitre/{course}', 'ChapterController@initChapter');
Route::post('/ajouterTitreChapitre/{course}', 'ChapterController@chapterInitialization');
Route::get('/nouvellePartie/{chapter}/{type}', 'PartController@partInitialization');
Route::get('/editer/{course}/{chapter}/{part}', 'PartController@showEditView');
Route::post('/editer/sauver', 'PartController@store');
Route::post('/test/sauver', 'TestController@store');
Route::get('/editer/aideImport', 'PartController@help');
