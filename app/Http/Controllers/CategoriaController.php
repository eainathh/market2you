<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::orderBy('created_at', 'desc')->get();


        return view('categorias.index', compact('categorias'));
    }

    public function getcategorias()
    {
        $categorias = Categorias::orderBy('created_at', 'desc')->get();


        return view('categorias._lista', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:255'
        ]);
        Categorias::create([
            'nome' => $request->input('categoria'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function updateCategorias(Request $request, $id)
    {

        $request->validate([
            'categoria' => 'required|string|max:255',
        ]);

        $categoria = Categorias::find($id);
        
        $categoria->update([
            'nome' => $request->input('categoria'),
        ]);

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categorias::find($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluida com sucesso!');
    }

    public function categoriasEdit(Request $request, $id)
    {
        $categoria = Categorias::find($id);
        return response()->json($categoria);
    }
}
