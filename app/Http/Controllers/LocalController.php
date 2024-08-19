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
        $locais = Locais::all();
        $locais = Locais::paginate(3);
        
        

        return view ('locais', compact('locais'));
    }

    public function store(Request $request)
    {
        $local = Locais::create([
            'nome' => $request->nome,
            'usuario_id' => Auth::id(),

        ]);
    }
}
