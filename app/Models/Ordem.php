<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    protected $table = 'ordens';

    protected $fillable = ['cliente_id', 'fornecedor_id', 'servico_id', 'valor', 'status'];

    public function rules(){
        return [
            'cliente_id' => 'exists:clientes,id',
            'fornecedor_id' => 'exists:fornecedores,id',
            'sevico_id' => 'exists:servicos,id',
            'valor' => 'required',

        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
             
        ];
    }

    public function cliente(){
        // uma ordem pertence a um cliente
        return $this->belongsTo('App\Models\Cliente');
    }

    public function fornecedor(){
        // uma ordem possui um fornecedor
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function servico(){
        // uma ordem e de um servico especifico
        return $this->belongsTo('App\Models\Servico');

    }
}
