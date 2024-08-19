<?php

namespace Database\Factories;

use App\Models\Itens;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItensCompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $itemId = Itens::inRandomOrder()->first()->id;
        return [
            'listacompra_id' => 1, 
            'item_id' => $itemId,
            'quantidade' => $this->faker->numberBetween(1, 10),
            'valor_unitario' => $this->faker->randomFloat(2, 0, 100), 
            'status' => $this->faker->randomElement(['ativo', 'desativado']),
        ];
    }
}