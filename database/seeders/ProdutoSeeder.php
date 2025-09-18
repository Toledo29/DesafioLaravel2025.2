<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::factory()->create([
            'foto' => 'url_da_imagem',
            'nome' => 'Test Product',
            'descricao' => 'This is a test product.',
            'preco' => 9.99,
            'quantidade' => 100,
            'categoria' => 'Test Category',
            'usuario_id' => 1,
        ]);

        Usuario::all()->each(function (Usuario $user) {
            Produto::factory(2)->create(['usuario_id' => $user->id]);
        });
    }
}
