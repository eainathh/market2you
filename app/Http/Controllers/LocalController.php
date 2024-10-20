<?php

namespace App\Http\Controllers;

use App\Models\Locais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $locais = Locais::orderBy('created_at', 'desc')->paginate(5);

        return view('locais.index', compact('locais'));
    }

    public function getlocais()
    {

        $userId = Auth::id();
        $locais = Locais::orderBy('created_at', 'desc')->paginate(5);

        return view('locais._lista', compact('locais'))->render();
    }

    public function store(Request $request)
    {
        $request->validate([
            'local' => 'required|string|max:255',
        ]);

        Locais::create([
            'nome' => $request->input('local'),
            'usuario_id' => Auth::id(),
        ]);
        return response()->json(["message" => "Local cadastrado com sucesso!"], 201);
    }

    public function destroy($id)
    {
        $locais = Locais::find($id);
        $locais->delete();

        return response()->json(['message' => 'Local deletado']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'local' => 'required|string|max:255',
        ]);

        $locais = Locais::find($id);
        $locais->update([
            'nome' => $request->input('local'),
        ]);

        return redirect()->route('locais.index')->with('success', 'Local Atualizado com sucesso!');
    }

    public function editlocais(Request $request, $id)
    {
        $locais = Locais::find($id);
        return response()->json($locais);
    }
}
