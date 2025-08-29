<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'nome' => 'Admin User',
            'email' => 'admin@example.com',
            'senha' => 'adminpassword',
        ]);

        Admin::factory(9)->create();
    }
}
