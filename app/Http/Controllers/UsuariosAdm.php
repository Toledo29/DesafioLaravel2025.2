<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuariosAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $usuarios = Usuario::paginate(10);
        }
        return view('usuarios.usuariosAdm' , compact('usuarios'));
    }
}
