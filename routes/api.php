<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obter-lista-clientes',[ClienteController::class, 'obterListaClientes']);
Route::post('/salvar-cliente',[ClienteController::class, 'salvarCliente']);
Route::post('/editar-cliente',[ClienteController::class, 'editarCliente']);
Route::post('/deletar-cliente/{id}',[ClienteController::class, 'deletarCliente']);

Route::get('/obter-lista-veiculos',[ClienteController::class, 'obterListaVeiculo']);
Route::post('/salvar-veiculo',[ClienteController::class, 'salvarVeiculo']);
Route::post('/editar-veiculo',[ClienteController::class, 'editarVeiculo']);
Route::post('/deletar-veiculo/{id}',[ClienteController::class, 'deletarVeiculo']);
