<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locais extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'usuario_id'
    ];
    
    // protected static function boot()
    // {
    //     //parent::boot();
    //     //return static::addGlobalScope(new UserScope);
    // }
}