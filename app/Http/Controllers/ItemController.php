<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $item = new Itens();
        $item->nome = $request->input('name');
        $item->save();

    }
}
