<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('funcionario_id')->unsigned()->nullable();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade')->onUpdate('cascade');

            $table->date('data');
            $table->time('hora');

            //Possíveis status: DISPONIVEL, MARCADO, ATENDIDO, CANCELADO.
            //DISPONIVEL: Não tem horário marcado.
            //MARCADO   : Tem horário marcado.
            //ATENDIDO  : Tinha horário marcado, e cliente compareceu/foi atendido.
            //CANCELADO : Tinha horário marcado, mas cliente não compareceu/não foi atendido.
            $table->enum('status', ['DISPONIVEL', 'MARCADO', 'ATENDIDO', 'CANCELADO'])->default("DISPONIVEL");

            $table->string('servico')->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
