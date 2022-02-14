<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/noticias', 'NoticiasController@index')->name('noticias.index');
Route::get('/noticias/create', 'NoticiasController@create')->name('noticias.create');
Route::post('/noticias/store', 'NoticiasController@store')->name('noticias.store');
Route::get('/noticias/{id}/edit', 'NoticiasController@edit')->name('noticias.edit');
Route::put('/noticias/{id}/update', 'NoticiasController@update')->name('noticias.update');
Route::delete('/noticias/{id}', 'NoticiasController@destroy')->name('noticias.destroy');
