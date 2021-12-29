<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', '200');
            $table->unsignedBigInteger('state_id');
            $table->softDeletes();
            $table->timestamps();
        });

        
        // Foreign key

        Schema::table('cities', function(Blueprint $table){
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::disableForeignKeyConstraints();

        // Drop Table
        Schema::dropIfExists('cities');

        // Enable Foreign Key
         Schema::enableForeignKeyConstraints();
    }
}
