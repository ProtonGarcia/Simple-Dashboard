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

Route::get('marcas-pdf','MarcaController@exportPdf')->name('marcas.pdf');
Route::get('departamentos-pdf','DepartamentoController@exportPdf')->name('departamentos.pdf');
Route::get('modelos-pdf','TipoVehiculoController@exportPdf')->name('modelos.pdf');

