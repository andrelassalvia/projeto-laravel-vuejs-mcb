<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'telefone', 'email', 'pais_residencia', 'cidade_residencia', 'estado_br', 'cidade_br', 'cpf', 'rg', 'passaporte', 'cnh', 'dt_nascimento'];
}
