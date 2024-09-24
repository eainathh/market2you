<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensCompra;
use Illuminate\Http\Request;

class ItensCompraController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->except('_token');

        $item = Itens::where('nome', $data['nome'])->first();

        if (!$item){ // se não existir

            $item = Itens::create([  // cria o item 
                'nome' => $data['nome'],                
            ]);
        }

        $itensCompra = ItensCompra::create([
            'item_id' => $item->id,
            'listacompra_id' => $data['listacompra_id']

        ]);


        return response()->json([
            'itens_compras' => $itensCompra,
            'item' => $item
        ]);


    }

    public function update(Request $request, $id)
    {

        $data = $request->all(); // traz tudo do request e salva na variavel data
        $sub_total =[]; // inicia o array vazio

        $id = 0;
        foreach($data['qtd'] as $key => $value){ // percorre cada qtd dos itens, key é o indice e value o valor
            
            $count  = $data['valor_unitario'][$key] * $value; // realiza a conta

            $sub_total[$key] = $count; // salva na variavel usando o indice (key)

            ItensCompra::where('id', $key)->update([ // atualiza o item que tem o id desejado
                'quantidade' => $value,
                'valor_unitario' => $data['valor_unitario'][$key],
                'valor_total' => $count,
            ]);
            $id = $key;

        }
       
        
        

        return response()->json([
        'id' => $id,
        'total' => $count,

        ]);

    }
}
