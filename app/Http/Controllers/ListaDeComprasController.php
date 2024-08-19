<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Listadecompras;
use App\Models\Locais;
use Illuminate\Http\Request;

class ListaDeComprasController extends Controller
{
    public function index()
    {
        $listadecompras = Listadecompras::with('local')->paginate('10');
        $itens = Itens::all();
        
        return view('lista', compact('listadecompras', 'itens'));    
    }

    public function create()
    {
        $itens = Itens::all();        
        $locais = Locais::orderBy('nome', 'asc')->get();
        $listadecompras = new Listadecompras();
        return view('listacreate', compact('locais', 'itens', 'listadecompras'));
    }

    public function store(Request $request){
        $request->validate([
            'item_id' => 'required|exists:itens,id',
            'lista_id' => 'required|exists:listadecompras,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $listadecompra = Listadecompras::find($request->input('lista_id'));
        $item =Itens::find($request->input('item_id'));

        $listadecompra->itens_compras()->create([
            'item_id' => $request->input('item_id'),
            'quantidade' => $request->input('quantity'),
        ]);

        return response()->json([
            'success' => true,
            'item_name' => $item->nome
        ]);
    }
    

}
