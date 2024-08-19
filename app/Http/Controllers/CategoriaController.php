<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::orderBy('created_at', 'desc')->paginate(10);


        return view('categorias', compact('categorias'));
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

    public function update(Request $request, $id)
    {

        $request->validate([
            'categoria' => 'required|string|max:255',
        ]);

        $categoria = Categorias::find($id);
        $categoria->update([
            'nome' => $request->input('categoria'),
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Categorias::find($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluida com sucesso!');
    }
}
