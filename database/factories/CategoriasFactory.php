<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorias = ['Frutas', 'Verduras', 'Laticínios', 'Carnes', 'Bebidas', 'Higiene', 'Limpeza', 'Pães', 'Grãos', 'Congelados'];

        return [
            'nome' => $this->faker->randomElement($categorias),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
