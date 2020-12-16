<?php

use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::apiResource('vehiculos','VehiculoController',['only' => ['index','show']]);
Route::apiResource('marcas','MarcaController',['only' => ['index']]);
Route::apiResource('marcasTop','MarcasTopController',['only' => ['index']]);
Route::apiResource('departamentos','DepartamentoController',['only' => ['index','show']]);
Route::apiResource('combustibles','CombustibleController',['only' => ['index']]);

Route::apiResource('modelos','TipoVehiculoController',['only' => ['index']]);
Route::apiResource('modelosTop','ModeloController',['only' => ['index']]);