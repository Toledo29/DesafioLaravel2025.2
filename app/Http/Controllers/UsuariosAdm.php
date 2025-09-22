<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $usuarios = Usuario::all();
        }
        return view('usuarios.usuariosAdm' , compact('usuarios'));
    }
}
