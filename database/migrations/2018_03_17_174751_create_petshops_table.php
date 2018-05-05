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
            $table->string('cpf');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('uf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('telefone');
            $table->string('email')->nullable();
            $table->string('imagem')->nullable();
            $table->string('informacao', 500)->nullable();
            $table->time('horarioAbertura')->nullable();
            $table->time('horarioFechamento')->nullable();
            
            $table->float('media_avaliacoes', 2, 1)->default(3.0);
            $table->integer('total_avaliacoes')->default(0);

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
