<?php

namespace App\Policies;

use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class ProdutoPolicy
{
    public function update($usuario, Produto $produto): bool
    {
        if($usuario instanceof Admin) {
            return true;
        }
        if($usuario instanceof Usuario) {
            return $usuario->id === $produto->usuario_id;
        }
        return false;
    }
    public function edit($usuario, Produto $produto): bool
    {
        if($usuario instanceof Admin) {
            return true;
        }
        if($usuario instanceof Usuario) {
            return $usuario->id === $produto->usuario_id;
        }
        return false;
    }
    public function delete($usuario, Produto $produto): bool
    {
        if($usuario instanceof Admin) {
            return true;
        }
        if($usuario instanceof Usuario) {
            return $usuario->id === $produto->usuario_id;
        }
        return false;
    }
}
