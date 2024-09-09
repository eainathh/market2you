<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           
            'nome' => 'required|string|max:255',
            
        ]);

        $item = Itens::create([
            'nome' => $request->input('nome'),
            
        ]);

        return response()->json(['item' => $item]);
    }
}
