<?php

namespace Database\Factories;

use App\Models\Locais;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListadeComprasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $local = Locais::withoutGlobalScopes()->inRandomOrder()->first();
        
        
        return [
            'data' => $this->faker->date(),
            'valor_total' => $this->faker->randomFloat(2, 10, 1000),
            'user_id' => $user->id,
            'local_id' => $local->id , 
            'status' => $this->faker->randomElement(['comprado', 'nao_comprado']),
            'default' => $this->faker->boolean,
            'meta' => $this->faker->randomFloat(2, 10, 100)
        ];
    }
}
