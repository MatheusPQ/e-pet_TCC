<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetshopServicoRacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petshopservicoracas', function (Blueprint $table) {
            $table->integer('petshop_id')->unsigned();
            $table->integer('servico_id')->unsigned();
            $table->integer('raca_id')->unsigned();

            $table->primary(['petshop_id', 'servico_id', 'raca_id'])->unsigned();
            
            $table->foreign('petshop_id')->references('id')->on('petshops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('raca_id')->references('id')->on('racas')->onDelete('cascade')->onUpdate('cascade');


            $table->decimal('preco', 8, 2)->nullable()->default(0.00);
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
        Schema::dropIfExists('petshopservicoracas');
    }
}
