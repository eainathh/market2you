<?php

namespace Database\Factories;

use App\Models\Locais;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locais>
 */
class LocaisFactory extends Factory
{
    protected $model = Locais::class;

    public function definition(): array
    {
        $supermercados = ['Walmart', 'Carrefour', 'Pão de Açúcar', 'Extra', 'BIG', 'Guanabara', 'Angeloni', 'Zaffari', 'Assaí', 'Makro'];

        return [
            'nome' => $this->faker->randomElement($supermercados),
            'usuario_id' => \App\Models\User::factory(),
        ];
    }
}
