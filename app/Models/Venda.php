<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'comprador_id',
        'vendedor_id',
        'preco',
        'data_venda',
    ];
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function comprador()
    {
        return $this->belongsTo(Usuario::class, 'comprador_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(Usuario::class, 'vendedor_id');
    }
}
