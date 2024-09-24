<?php

namespace App\Http\Controllers;

use App\Models\ItensCompra;
use App\Models\Listadecompras;
use Illuminate\Http\Request;

class MinhasComprasController extends Controller
{
    public function index()
    {
        $listadecompras = Listadecompras::with('local')->paginate('10');
        return view('minhascompras', compact('listadecompras'));
    }

    public function show(Request $request, $id)
    {
        $compra = Listadecompras::with('itens_compras','local')->find($id);

        

        return view('minhascomprasshow', compact('compra'));
    }
}
