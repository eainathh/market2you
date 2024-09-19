<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use Illuminate\Http\Request;

class ItensCompraController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->except('_token');

        $item = Itens::where('nome', $data['nome'])->first();

        if (!$item){ // se não existir

            $item = Itens::create([  // cria o item 
                'nome' => $data['nome'],                
            ]);
        }

        $itensCompra = ItensCompra::create([
            'item_id' => $item->id,
            'listacompra_id' => $data['listacompra_id']

        ]);


        return response()->json([
            'itens_compras' => $itensCompra,
            'item' => $item
        ]);


    }

    public function update(Request $request, $id)
    {
        $itenscompras = ItensCompra::find($id);
        // $data=$request->except('_token');
        // // $itenscompras->update([
        // //     'quantidade' => $request->input('quantidade'),
        // //     'valor_unitario' => $request->input('valor_unitario')
        // // ]);
        $itenscompras->update([
            'quantidade' => $request->input('quantidade'),
            'valor_unitario' => $request->input('valor_unitario')
        ]);
        $itenscompras = ItensCompra::find($id);

        return response()->json([
            'id' => $itenscompras
        ]);

    }
}
