<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', '100')->unique()->nullable();
            $table->string('telefone', '30')->unique()->nullable();
            $table->string('email', '80')->unique()->nullable();
            $table->string('pais_residencia', '100')->nullable();
            $table->string('cidade_residencia', '100')->nullable();
            $table->string('estado_br', '2')->nullable();
            $table->string('cidade_br', '100')->nullable();
            $table->string('cpf', '11')->nullable();
            $table->string('rg', '15')->nullable();
            $table->string('passaporte', '15')->nullable();
            $table->string('cnh', '15')->nullable();
            $table->date('dt_nascimento')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
