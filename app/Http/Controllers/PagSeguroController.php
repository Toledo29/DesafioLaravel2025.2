<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\Usuario;
use Illuminate\Support\Facades\Http;

class PagSeguroController extends Controller
{
    public function checkout(Request $request){

        $url = config('services.pagseguro.checkout_url');
        $token = config('services.pagseguro.token');

        $produto = json_decode($request->produto, true);
        
        $item = [
            'name' => $produto['nome'],
            'quantity' => 1,
            'unit_amount' => $produto['preco'] * 100,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($url, [
            'reference_id' => uniqid(),
            'items' => [$item],
        ]);

        if($response->successful()){
            Venda::create([
                'reference_id' => $response['reference_id'],
                'comprador_id' => auth('web_usuario')->user()->id,
                'vendedor_id' => $produto['usuario_id'],
                'preco' => $produto['preco'],
                'produto_id' => $produto['id'],
                'data_venda' => now(),
                'status' => 2,
            ]);
            Produto::where('id', $produto['id'])->update(['quantidade' => $produto['quantidade'] - 1]);
            Usuario::where('id', $produto['usuario_id'])->increment('saldo', $produto['preco']);
            Usuario::where('id', auth('web_usuario')->user()->id)->decrement('saldo', $produto['preco']);
            $pay_link = data_get($response->json(), 'links.1.href');
            return redirect()->away($pay_link);
        } else {
            return back()->withErrors('Erro ao iniciar o checkout. Tente novamente.');
        }
    }
}
