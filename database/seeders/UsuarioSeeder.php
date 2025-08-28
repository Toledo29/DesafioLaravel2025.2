<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::factory()->create([
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'telefone' => '123456789',
            'data_nascimento' => '2000-01-01',
            'cpf' => '123.456.789-00',
            'senha' => 'password',
            
        ]);

        Usuario::factory(18)->create();
    }
}
