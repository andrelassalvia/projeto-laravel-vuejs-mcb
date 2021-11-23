<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'telefone', 'email', 'estado', 'cidade'];

    public function rules(){
        return [
            'nome' => 'required|unique:fornecedores|min:3', 
            'telefone' => 'unique:fornecedores',
            'email' => 'email', 
            /*
            'estado', 
            'cidade'
            */
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'Este :attribute já existe no banco de dados',
            'nome.min' => 'O campo nome deve ter no mínimo 3 letras.',
            'email' => 'O campo email deve ser válido.'
        ];
    }

    public function ordens(){
        return $this->hasMany('App\Models\Ordem');
    }
}
