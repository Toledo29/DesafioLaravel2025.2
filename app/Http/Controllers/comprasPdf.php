<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;

class comprasPdf extends Controller
{
    public function __invoke(){

        $user = auth()->guard('web_usuario')->user();
        $compras = Venda::where('comprador_id', $user->id)->get();
        $pdf = Pdf::loadView('compras.comprasPdf', ['compras' => $compras]);
        return $pdf->stream("compras.comprasPdf");
    }

}
