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
            'nome' => 'bail|required|min:3|unique:clientes',
            'telefone' => 'bail|required|unique:clientes',
            'email' => 'bail|required|email',
            'cpf_imagem' => 'bail|file|mimes:png,jpeg,jpg',
            'rg_imagem' => 'bail|file|mimes:png,jpeg,jpg',
            'passaporte_imagem' => 'bail|file|mimes:png,jpeg,jpg',
            'cnh_imagem' => 'bail|file|mimes:png,jpeg,jpg',
            'dt_nascimento' => 'date'

        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 letras.',
            'unique' => 'Este :attribute já existe no banco de dados',
            'email' => 'O campo email deve ser válido.',
            'date' => 'Data deve ser válida.',
            'mimes' => 'O arquivo deve ser possuir a extensão .png, .jpeg ou .jpg'
        ];
    }

    public function ordens(){
        // um cliente pode ter varias ordens
        return $this->hasMany('App\Models\Ordem');
    }
}
