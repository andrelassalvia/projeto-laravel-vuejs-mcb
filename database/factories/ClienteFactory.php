<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'=> $this->faker->name, 
            'telefone' => $this->faker->phoneNumber, 
            'email' => $this->faker->safeEmail, 
            'pais_residencia' => $this->faker->country, 
            'cidade_residencia' => $this->faker->city, 
            'estado_br' => $this->faker->stateAbbr, 
            'cidade_br' => $this->faker->city, 
            'rg' => $this->faker->e164PhoneNumber, 
            'passaporte' => $this->faker->e164PhoneNumber, 
            'cnh' => $this->faker->e164PhoneNumber, 
            'dt_nascimento' => $this->faker->date

            //
        ];
    }
}
