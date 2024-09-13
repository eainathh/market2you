<?php

namespace App\Http\Controllers;

use App\Models\Itens;
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

    public function getitens(Request $request)
    {
        $itens = Itens::all();
        $itemName = $request->input('intemName');

        return view('lista._lista',compact('itemName','itens'));
    }
}
