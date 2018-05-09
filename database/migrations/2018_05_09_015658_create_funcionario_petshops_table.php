<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioPetshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_petshops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->unsigned();
            $table->integer('petshop_id')->unsigned();

            $table->foreign('petshop_id')->references('id')->on('petshops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('funcionario_petshops');
    }
}
