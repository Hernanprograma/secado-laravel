<?php

use proyectoPrueba\MuestrasCamion;
use proyectoPrueba\LineaMuestra;
use proyectoPrueba\User;

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

Route::get('pruebasLineaMuestra', function () {
    $muestras = LineaMuestra::LineaB()->get();
    dd($muestras);
});

Route::resource('lineamuestras', 'LineaMuestrasController');
Route::resource('muestrascamion', 'MuestrasCamionController');
Route::resource('gasconsumo', 'GasConsumoController');

Auth::routes();

Route::get('/home', 'HomeController@index');
