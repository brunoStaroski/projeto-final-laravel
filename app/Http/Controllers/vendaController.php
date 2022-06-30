<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Sodium\add;

class vendaController extends Controller
{
    public function salvarVenda(Request $request) {
        $venda = new Venda();
        $venda->id_cliente = $request->idCliente;
        $venda->id_veiculo = $request->idVeiculo;
        $venda->save();
        return response()->json([], 200);
    }

    public function obterListaVendas() {
        $listaVendas = [];
        $vendas = Venda::all();
        if ($vendas != null) {
            foreach($vendas as $vendaTemp) {
                $cliente = (new \App\Models\Cliente)->findOrFail($vendaTemp->id_cliente);
                $veiculo = (new \App\Models\Veiculo)->findOrFail($vendaTemp->id_veiculo);
                array_push($listaVendas, ['id' => $vendaTemp->id, 'cliente' => $cliente, 'veiculo' => $veiculo]);
            }
        }
        return response()->json([
            'vendas' => $listaVendas
        ], 200);
    }
}
