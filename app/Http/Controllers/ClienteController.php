<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function obterListaClientes() {
        $clientes = Cliente::all();
        return response()->json([
            'clientes' => $clientes
        ], 200);
    }

    public function salvarCliente(Request $request) {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->save();
        return response()->json([], 200);
    }

    public function editarCliente(Request $request) {
        $cliente = new Cliente();
        $cliente->id = $request->id;
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->update();
        return response()->json([], 200);
    }

    public function deletarCliente(Request $request) {
        $cliente = Cliente::findOrFail($request->id);
        $cliente->delete();
        return response()->json([], 200);
    }
}
