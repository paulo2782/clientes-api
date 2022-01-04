<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotas Clientes
Route::get('allClient','ControllerClient@all');         // Lista todos Clientes

Route::post('createClient',       'ControllerClient@create');   // Adiciona Cliente
Route::get('readClient/{id}',     'ControllerClient@read');     // Lista um Cliente pelo ID
Route::put('updateClient/{id}',   'ControllerClient@update');   // Alterar Registro Cliente 
Route::delete('deleteClient/{id}','ControllerClient@delete');   // Excluir Cliente 

// Rotas Dependentes
Route::get('allDepentsClient/{id}','ControllerDependent@allDepentsClient'); // Lista todos dependentes do cliente

Route::post('createDependent',       'ControllerDependent@create');// Adiciona Dependente
Route::get('readDependent/{id}',     'ControllerDependent@read');  // Lista um Dependente pelo ID
Route::put('updateDependent/{id}',   'ControllerDependent@update');// Alterar Registro Dependente
Route::delete('deleteDependent/{id}','ControllerDependent@delete');// Excluir Dependente 
