<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'marca',
        'valor_unitario',
        'status'
    ];

    

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
