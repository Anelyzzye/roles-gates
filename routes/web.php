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



Route::get('/students', 'EstudiantesController@index')->name('studen.list');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'EstudiantesController@admin')->name('administrativa');
Route::get('/nopriv', 'EstudiantesController@noadmin')->name('areausuario');



//crud EstudiantesController
Route::get('/home', 'EstudiantesController@registros')->name('home');

//autocompletado
Route::get('/completa','EstudiantesController@autocompletar')->name('autocompletar.index');
Route::post('/completa/busqueda','EstudiantesController@mostrardata')->name('autocompletar.alumn');