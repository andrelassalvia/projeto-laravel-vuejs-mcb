<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Which documents could have a image associated with
    // public $docsImages = ['cpf', 'rg', 'passaporte', 'cnh'];

    

    public $docsElements = array(
        [
            'el' => 'cpf',
            'field'=> 'cpf_imagem',

        ], 
        [
            'el'=> 'rg',
            'field'=> 'rg_imagem',
                    ],
        [
            'el'=> 'passaporte',
            'field'=> 'passaporte_imagem',
                    ],
        [
            'el'=> 'cnh',
            'field'=> 'cnh_imagem',
        ]
    );

    protected $fillable = ['nome', 'telefone', 'email', 'pais_residencia', 'cidade_residencia', 'estado_br', 'cidade_br', 'cpf', 'rg', 'passaporte', 'cnh', 'dt_nascimento'];

    public function rules(){
        return [
            'nome' => 'required|min:3|unique:clientes',
            'telefone' => 'required|unique:clientes',
            'email' => 'required|email',
            /*
            'pais_residencia' => ,
            'cidade_residencia' => ,
            'estado_br' => ,
            'cidade_br' => ,
            'cpf' => ,
            'rg' => ,
            'passaporte' => ,
            'cnh' => ,
            */
            'dt_nascimento' => 'date'

        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 letras.',
            'unique' => 'Este :attribute já existe no banco de dados',
            'email' => 'O campo email deve ser válido.',
            'date' => 'Data deve ser válida.'
        ];
    }
}
