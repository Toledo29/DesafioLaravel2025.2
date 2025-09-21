<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class vendasAdm extends Controller
{
    public function __invoke(){
        if(auth()->guard('web_admin')->check()){
            $vendas = Venda::all();
        }
        elseif(auth()->guard('web_usuario')->check()){
            $user = auth()->guard('web_usuario')->user();
            $vendas = Venda::where('vendedor_id', $user->id)->get();
        }
        return view('vendas.vendasAdm' , compact('vendas'));
    }
}
