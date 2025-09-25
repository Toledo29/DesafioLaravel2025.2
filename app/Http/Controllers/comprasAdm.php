<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;


class comprasAdm extends Controller
{
    public function __invoke(){

        $user = auth()->guard('web_usuario')->user();
        $compras = Venda::where('comprador_id', $user->id)->get();

        return view('compras.comprasAdm' , compact('compras'));

    }
}
