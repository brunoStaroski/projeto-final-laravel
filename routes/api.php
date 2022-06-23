<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\VendaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obter-lista-clientes',[ClienteController::class, 'obterListaClientes']);
Route::post('/salvar-cliente',[ClienteController::class, 'salvarCliente']);
Route::post('/editar-cliente',[ClienteController::class, 'editarCliente']);
Route::post('/deletar-cliente/{id}',[ClienteController::class, 'deletarCliente']);

Route::get('/obter-lista-veiculos',[VeiculoController::class, 'obterListaVeiculo']);
Route::post('/salvar-veiculo',[VeiculoController::class, 'salvarVeiculo']);
Route::post('/editar-veiculo',[VeiculoController::class, 'editarVeiculo']);
Route::post('/deletar-veiculo/{id}',[VeiculoController::class, 'deletarVeiculo']);

Route::get('/obter-lista-venda',[VeiculoController::class, 'obterListaVeiculo']);
Route::post('/salvar-venda',[VeiculoController::class, 'salvarVeiculo']);
