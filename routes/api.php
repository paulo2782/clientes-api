<?php

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
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('allClient','ControllerClient@all');         // Lista todos Clientes
Route::get('showClient/{id}','ControllerClient@show');  // Lista um Cliente pelo ID
Route::post('storeClient','ControllerClient@store');    // Adiciona Cliente
Route::delete('deleteClient/{id}','ControllerClient@delete'); // Excluir Cliente 
Route::put('updateClient/{id}','ControllerClient@update'); // Alterar Registro Cliente 

