<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

     public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'categoria',
        'usuario_id',
    ];
}
