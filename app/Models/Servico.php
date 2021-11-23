<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function rules(){
        return [
            'nome' => 'required|unique:servicos'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'Este nome já foi utilizado para registrar um serviço.'
        ];
    }

    public function ordens(){
        return $this->hasMany('App\Models\Ordem');
    }
}
