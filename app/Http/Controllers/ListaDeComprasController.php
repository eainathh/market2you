<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use App\Models\Listadecompras;
use App\Models\Locais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaDeComprasController extends Controller
{
    public function index()
    {
        $listadecompras = Listadecompras::with('local')->paginate('10');
        $itens = Itens::all();


        return view('lista.index', compact('listadecompras', 'itens'));
    }

    public function create(Request $request)
    {


        $itens = Itens::all();
        $locais = Locais::all();
        return view('lista.create', compact('locais', 'itens'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');


        $lista = Listadecompras::create([
            'data' => date('Y-m-d'),
            'user_id' => Auth::id(),
            'local_id' => $data['local_id'],
        ]);
        

        return response()->json(['id' => $lista->id]);
    }

    public function update(Request $request, $id)
    {
        
        $listadecompras = Listadecompras::find($id);
        $listadecompras->update([
            'meta' => $request->input('meta'),
        ]);
        $listadecompras = Listadecompras::find($id);


        return response()->json(['id' => $listadecompras]);
    }
}
