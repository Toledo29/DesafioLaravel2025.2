<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
     public function buscarCep(Request $request)
    {
        $cep = $request->input('cep');

        if (empty($cep)) {
            return response()->json(['erro' => 'CEP não informado'], 400);
        }

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['erro'])) {
                return response()->json(['erro' => 'CEP não encontrado'], 404);
            }

            return response()->json($data);
        } else {

            return response()->json(['erro' => 'Falha ao buscar CEP'], $response->status());
        }
    }
}
