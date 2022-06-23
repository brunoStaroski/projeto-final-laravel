<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class veiculoController extends Controller
{
    public function obterListaVeiculo() {
        $veiculos = Veiculo::all();
        return response()->json([
            'veiculos' => $veiculos
        ], 200);
    }

    public function salvarVeiculo(Request $request) {
        $veiculo = new Veiculo();
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->valor = $request->valor;
        $veiculo->save();
        return response()->json([], 200);
    }

    public function editarVeiculo(Request $request) {
        $veiculo = new Veiculo();
        $veiculo->id = $request->id;
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->valor = $request->valor;
        $retorno = $veiculo->update();
        Log::error($retorno);
        return response()->json([], 200);
    }

    public function deletarVeiculo(Request $request) {
        $cliente = Cliente::findOrFail($request->id);
        $cliente->delete();
    }
}
