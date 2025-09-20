<?php

namespace App\Policies;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class ProdutoPolicy
{
    public function update(Usuario $usuario, Produto $produto): bool
    {
        return $usuario->id === $produto->usuario_id;
    }
}
