<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use Illuminate\Http\Request;

class ItensCompraController extends Controller
{
    public function addItemCompra(Request $request)
    {
        $item = Itens::firstOrCreate(
            ['nome' => $request->input('item')],

            [
                'marca' => null,
                'valor_unitario' => 0,
                'status' => 'ativo',

            ]
        );
        $itemCompra = ItensCompra::create([
            'item_id' => $request->input('item_id'),
            'listacompra_id' => $request->input('listacompra_id'),
            'valor_unitario' => $request->input('valor_unitario'),
            'quantidade' => $request->input('quantidade'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['item_compra' => $itemCompra]);
    }

    public function getitens()
    {
        $itens = Itens::all();
        return response()->json($itens);
    }
}
