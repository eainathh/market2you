<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'listacompra_id',
        'item_id',
        'valor_unitario',
        'quantidade',
        'status'
    ];

    public function listadecompras()
    {
        return $this->belongsTo(Listadecompras::class, 'listacompra_id');
    }

    public function itens()
    {
        return $this->belongsTo(Itens::class, 'item_id');
    }

    public function sub_total()
    {
        return $this->valor_unitario * $this->quantidade;
    }
}
