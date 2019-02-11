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

// Linea
Route::get('/linea','LineaController@index');
Route::get('/linea/create','LineaController@create');
Route::post('/linea','LineaController@store');
Route::get('/linea/{linea}/edit','LineaController@edit');
Route::put('/linea/{linea}/edit','LineaController@update');
Route::delete('/linea/{id}','LineaController@destroy');
