<?php

namespace Database\Factories;

use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoria = Categorias::inRandomOrder()->first();

        $nome_itens = [
            'Arroz', 'Feijão', 'Macarrão', 'Açúcar', 'Sal', 'Óleo', 'Leite', 'Manteiga', 'Pão', 'Queijo',
            'Presunto', 'Bacon', 'Frango', 'Carne Bovina', 'Peixe', 'Batata', 'Cebola', 'Tomate', 'Alface', 'Cenoura',
            'Maçã', 'Banana', 'Laranja', 'Limão', 'Uva', 'Pera', 'Melancia', 'Melão', 'Café', 'Chá',
            'Achocolatado', 'Farinha', 'Fermento', 'Leite Condensado', 'Creme de Leite', 'Maionese', 'Ketchup', 'Mostarda', 'Molho de Soja', 'Azeite', 'Vinagre',
            'Papel Toalha', 'Papel Higiênico', 'Sabão em Pó', 'Detergente', 'Amaciante', 'Desinfetante', 'Esponja de Louça', 'Desodorante', 'Shampoo', 'Sabonete',
            'Escova de Dente', 'Creme Dental'
        ];

        $marcas = ['Nestlé', 'Coca-Cola', 'Unilever', 'Colgate', 'Procter & Gamble', 'Pepsi', 'Heinz', 'Danone', 'Nivea', 'Ypê', 'Johnson & Johnson', 'Sadia', 'Perdigão', 'Hellmann\'s', 'Itambé', 'Qualy', 'Bombril', 'Palmolive', 'Tio João', 'Seara', 'Gallo', 'Bauducco', 'Ambev'];

        return [
            'categoria_id' => $categoria ? $categoria->id : null,
            'nome' => $this->faker->randomElement($nome_itens),
            'marca' => $this->faker->randomElement($marcas),
            'valor_unitario' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['ativo','desativado']),

        ];
    }
}
