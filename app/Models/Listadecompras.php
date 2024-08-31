<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listadecompras extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'date'
    ];

    protected $fillable = [
        'data',
        'valor_total',
        'user_id',
        'status',
        'local_id',
        'default',
        'meta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function local()
    {
        return $this->belongsTo(Locais::class,'local_id');
    }

    public function itens_compras()
    {
        return $this->hasMany(ItensCompra::class, 'listacompra_id');
    }


    
    
}
