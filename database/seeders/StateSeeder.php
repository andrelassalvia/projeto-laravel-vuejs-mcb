<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                "id"=> 12,
                "name"=> "Acre",
                "code"=> "AC"
            ],
            [
                "id"=> 27,
                "name"=> "Alagoas",
                "code"=> "AL"
            ],
            [
                "id"=> 16,
                "name"=> "Amapá",
                "code"=> "AP"
            ],
            [
                "id"=> 13,
                "name"=> "Amazonas",
                "code"=> "AM"
            ],
            [
                "id"=> 29,
                "name"=> "Bahia",
                "code"=> "BA"
            ],
            [
                "id"=> 23,
                "name"=> "Ceará",
                "code"=> "CE"
            ],
            [
                "id"=> 53,
                "name"=> "Distrito Federal",
                "code"=> "DF"
            ],
            [
                "id"=> 32,
                "name"=> "Espírito Santo",
                "code"=> "ES"
            ],
            [
                "id"=> 52,
                "name"=> "Goiás",
                "code"=> "GO"
            ],
            [
                "id"=> 21,
                "name"=> "Maranhão",
                "code"=> "MA"
            ],
            [
                "id"=> 51,
                "name"=> "Mato Grosso",
                "code"=> "MT"
            ],
            [
                "id"=> 50,
                "name"=> "Mato Grosso do Sul",
                "code"=> "MS"
            ],
            [
                "id"=> 31,
                "name"=> "Minas Gerais",
                "code"=> "MG"
            ],
            [
                "id"=> 15,
                "name"=> "Pará",
                "code"=> "PA"
            ],
            [
                "id"=> 25,
                "name"=> "Paraíba",
                "code"=> "PB"
            ],
            [
                "id"=> 41,
                "name"=> "Paraná",
                "code"=> "PR"
            ],
            [
                "id"=> 26,
                "name"=> "Pernambuco",
                "code"=> "PE"
            ],
            [
                "id"=> 22,
                "name"=> "Piauí",
                "code"=> "PI"
            ],
            [
                "id"=> 33,
                "name"=> "Rio de Janeiro",
                "code"=> "RJ"
            ],
            [
                "id"=> 24,
                "name"=> "Rio Grande do Norte",
                "code"=> "RN"
            ],
            [
                "id"=> 43,
                "name"=> "Rio Grande do Sul",
                "code"=> "RS"
            ],
            [
                "id"=> 11,
                "name"=> "Rondônia",
                "code"=> "RO"
            ],
            [
                "id"=> 14,
                "name"=> "Roraima",
                "code"=> "RR"
            ],
            [
                "id"=> 42,
                "name"=> "Santa Catarina",
                "code"=> "SC"
            ],
            [
                "id"=> 35,
                "name"=> "São Paulo",
                "code"=> "SP"
            ],
            [
                "id"=> 28,
                "name"=> "Sergipe",
                "code"=> "SE"
            ],
            [
                "id"=> 17,
                "name"=> "Tocantins",
                "code"=> "TO"
            ]
        ];

        foreach ($states as $state) {
            State::create($state);
        }

    }
}
