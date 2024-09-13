<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use Illuminate\Http\Request;

class ItensCompraController extends Controller
{
    public function store(Request $request, $id)
    {
       
        $itemCompra = ItensCompra::create([
            'item_id' => $request->input('item_id'),
            'quantidade' => $request->input('quantidade'),
            'valor_unitario' => $request->input('valor_unitario'),            
            
        ]);

        return response()->json(['item_compra' => $itemCompra]);
    }

    
}
