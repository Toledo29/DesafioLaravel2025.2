<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    protected static ?string $senha;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'data_nascimento' => fake()->date(),
            'cpf' => fake()->unique()->numerify('###.###.###-##'),
            'foto' => fake()->imageUrl(),
            'cep' => fake()->postcode(),
            'numero' => fake()->buildingNumber(),
            'logradouro' => fake()->streetName(),
            'bairro' => fake()->word(),
            'cidade' => fake()->city(),
            'estado' => fake()->state(),
            'complemento' => fake()->optional()->randomNumber(),
            'email_verified_at' => now(),
            'senha' => static::$senha ??= Hash::make('senha'),
            'remember_token' => Str::random(10),
        ];
    }
    
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
