<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeFantasia');
            $table->string('razaoSocial');
            $table->string('cnpj');
            $table->string('cep');
            $table->string('endereco');
            $table->string('uf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('telefone');
            $table->string('informacao');
            $table->time('horarioAbertura');
            $table->time('horarioFechamento');
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
        Schema::dropIfExists('petshops');
    }
}
