<?php

namespace Database\Seeders;

use App\Models\User;
use APP\Models\Admin;
use APP\Models\Produto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nome' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Admin::factory()->create([
            'nome' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        Produto::factory()->create([
            'nome' => 'Test Product',
            'descricao' => 'This is a test product.',
            'preco' => 9.99,
            'quantidade' => 100,
            'categoria' => 'Test Category',
            'usuario_id' => 1,
        ]);

        Admin::factory(9)->create();
        User::factory(18)->create();
        Produto::factory(36)->create();

    }
}
