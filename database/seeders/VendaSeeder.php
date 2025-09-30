<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Venda;
use App\Models\Produto;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = Usuario::all();
        $produtos = Produto::all();

        for ($i = 0; $i < 10; $i++) {
        $vendedores = $usuarios->shuffle();
        $comprador = $vendedores->first();
        $vendedor = $vendedores->where('id', '!=', $comprador->id)->first();

        if ($comprador && $vendedor) {
            $produtosComprador = Produto::where('usuario_id', $comprador->id)->get();

            if ($produtosComprador->count() > 0) {
                $produto = $produtosComprador->random();

                Venda::factory()->create([
                    'reference_id' => uniqid(),
                    'comprador_id' => $comprador->id,
                    'vendedor_id' => $vendedor->id,
                    'produto_id' => $produto->id,
                    'preco' => $produto->preco,
                    'data_venda' => now(),
                    'status' => 2,
                    ]);
                }
            }
        }
    }
}
