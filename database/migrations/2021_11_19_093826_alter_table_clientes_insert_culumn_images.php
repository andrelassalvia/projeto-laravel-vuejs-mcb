<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientesInsertCulumnImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function(Blueprint $table){
            $table->string('cpf_imagem', 100)->after('cpf')->nullable();
            $table->string('rg_imagem', 100)->after('rg')->nullable();
            $table->string('passaporte_imagem', 100)->after('passaporte')->nullable();
            $table->string('cnh_imagem', 100)->after('cnh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        schema::disableForeignKeyConstraints();

        Schema::table('clientes', function (Blueprint $table){
            $table->dropColumn('cpf_imagem');
            $table->dropColumn('rg_imagem');
            $table->dropColumn('passaporte_imagem');
            $table->dropColumn('cnh_imagem');
        });

        schema::enableForeignKeyConstraints();


    }
}
