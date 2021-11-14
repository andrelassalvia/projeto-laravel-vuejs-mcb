<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('fornecedor_id');
            $table->unsignedBigInteger('servico_id');
            $table->float('valor', 8, 2);
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();
        });

        // Foreign Key
        Schema::table('ordens', function(Blueprint $table){
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('servico_id')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Disable Foreign Key
        schema::disableForeignKeyConstraints();

        // Drop Table
        Schema::dropIfExists('ordens');

        // Enable Foreign Key
        schema::enableForeignKeyConstraints();
    }
}
