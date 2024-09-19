<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           
            'nome' => 'required|string|max:255|unique:itens,nome',
            
        ]);

        $item = Itens::create([
            'nome' => $request->input('nome'),
            
        ]);

        return response()->json(['item' => $item]);
    }

    public function getitens(Request $request, $id)
    {
        $itemCompra = ItensCompra::where('listacompra_id',$id) // onde a listacompra_id é igual ao que esta no id (url)
        ->with('itens') // traz também o relacionamento
        ->get();

        return view('lista._lista', compact('itemCompra'));
    }
}
