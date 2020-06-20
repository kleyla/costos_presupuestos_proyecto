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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/start', 'UserController@start')->name('start');
Route::get('/atras', function () {
    return view('welcome');
});
Route::get('/miPerfil', 'UserController@miPerfil')->name('miPerfil');
//-----------------   MATERIA
Route::get('/newMateria', 'MateriaController@create')->name('newMateria');
Route::post('/materiaSave', 'MateriaController@store')->name('materiaSave');
Route::get('/verMateria/{idM}','MateriaController@verMateria')->name('verMateria');
Route::get('/editMateria/{idM}','MateriaController@editMateria')->name('editMateria');
Route::post('/materiaEdited/{idM}', 'MateriaController@update')->name('materiaEdited');
Route::get('/delMateria/{idM}', 'MateriaController@delMateria')->name('delMateria');
Route::post('/deleteMateria/{idM}', 'MateriaController@deleteMateria')->name('deleteMateria');

//-----------------   TEMA
Route::get('/newTema/{idM}', 'TemaController@create')->name('newTema');
Route::post('/temaSave/{idM}', 'TemaController@store')->name('temaSave');
Route::get('/verTema/{idT}','TemaController@verTema')->name('verTema');
Route::get('/editTema/{idM}','TemaController@edit')->name('editTema');
Route::post('/temaEdited/{idT}', 'TemaController@update')->name('temaEdited');
Route::get('/delTema/{idT}', 'TemaController@delTema')->name('delTema');
Route::post('/deleteTema/{idM}', 'TemaController@deleteTema')->name('deleteTema');


//-----------------   PRACTICO
Route::get('/newPractico/{idM}', 'PracticoController@create')->name('newPractico');
Route::post('/practicoSave/{idM}', 'PracticoController@store')->name('practicoSave');
//Route::get('/verTema/{idT}','TemaController@verTema')->name('verTema');
Route::get('/editPractico/{idM}','PracticoController@edit')->name('editPractico');
Route::post('/editedPractico/{idP}', 'PracticoController@update')->name('editedPractico');
Route::get('/delPractico/{idP}', 'PracticoController@delPractico')->name('delPractico');
Route::post('/deletePractico/{idP}', 'PracticoController@deletePractico')->name('deletePractico');
Route::get('/downloadPractico/{idP}', 'PracticoController@downloadPractico')->name('downloadPractico');

//-----------------   ARCHIVO
Route::get('/newArchivo/{idT}', 'ArchivoController@create')->name('newArchivo');
Route::post('/saveArchivo/{idM}', 'ArchivoController@store')->name('saveArchivo');
//Route::get('/verTema/{idT}','ArchivoController@verTema')->name('verTema');
Route::get('/delArchivo/{idA}', 'ArchivoController@delArchivo')->name('delArchivo');
Route::post('/deleteArchivo/{idM}', 'ArchivoController@deleteArchivo')->name('deleteArchivo');
Route::get('/downloadArchivo/{idA}', 'ArchivoController@downloadArchivo')->name('downloadArchivo');
