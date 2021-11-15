<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    protected $table = 'ordens';

    protected $fillable = ['cliente_id', 'fornecedor_id', 'sevico_id', 'valor', 'status'];
}
