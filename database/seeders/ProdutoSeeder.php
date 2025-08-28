<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::factory()->create([
            'nome' => 'Test Product',
            'descricao' => 'This is a test product.',
            'preco' => 9.99,
            'quantidade' => 100,
            'categoria' => 'Test Category',
            'usuario_id' => 1,
        ]);

        Produto::factory(36)->create();
    }
}
