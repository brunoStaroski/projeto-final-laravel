<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class veiculoController extends Controller
{
    public function obterListaVeiculo() {
        $clientes = Cliente::all();
        return response()->json([
            'clientes' => $clientes
        ], 200);
    }

    public function salvarVeiculo(Request $request) {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->save();
        return response()->json([], 200);
    }

    public function editarVeiculo(Request $request) {
        $cliente = new Cliente();
        $cliente->id = $request->id;
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $retorno = $cliente->update();
        Log::error($retorno);
        return response()->json([], 200);
    }

    public function deletarVeiculo($id) {
        $cliente = Cliente::query("select * from cliente where id = ".$id);
        if ($cliente != null) {
            $cliente->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
}
