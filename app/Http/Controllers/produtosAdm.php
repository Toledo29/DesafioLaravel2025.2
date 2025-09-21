<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class produtosAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $produtos = Produto::all();
        }
        elseif(auth()->guard('web_usuario')->check()){
            $user = auth()->guard('web_usuario')->user();
            $produtos = Produto::where('usuario_id', $user->id)->get();
        }
        return view('produtos.produtosAdm' , compact('produtos'));
    }
}
