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

            $table->date('data');
            $table->time('hora');
            $table->string('status')->default("DISPONIVEL"); //Ou está DISPONIVEL, ou está INDISPONIVEL. (Indisponivel quando está com horario marcado neste dia, nesta hora).

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('raca_id')->unsigned()->nullable();
            $table->foreign('raca_id')->references('id')->on('racas')->onDelete('cascade')->onUpdate('cascade');

            $table->decimal('preco', 8, 2)->nullable();
            
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
