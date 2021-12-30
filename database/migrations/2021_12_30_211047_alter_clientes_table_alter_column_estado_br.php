<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientesTableAlterColumnEstadoBr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::disableForeignKeyConstraints();

        Schema::table('clientes', function(Blueprint $table){
            $table->dropColumn('estado_br');
        });
        Schema::table('clientes', function(Blueprint $table){
            $table->string('estado_br', '30')->after('cidade_residencia')->nullable();
        });

        schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::disableForeignKeyConstraints();

        Schema::table('clientes', function(Blueprint $table){
            $table->dropColumn('estado_br');
        });

        Schema::table('clientes', function (Blueprint $table){
            $table->string('estado_br', '2')->nullable();

        });

        schema::enableForeignKeyConstraints();

    }
}
