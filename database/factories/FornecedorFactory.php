<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fornecedor;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name, 
            'telefone' => $this->faker->phoneNumber, 
            'email' => $this->faker->safeEmail, 
            'estado' => $this->faker->stateAbbr, 
            'cidade' => $this->faker->city
            //
        ];
    }
}
