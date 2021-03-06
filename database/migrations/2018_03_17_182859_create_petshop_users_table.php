<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetshopUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petshop_users', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('petshop_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['petshop_id', 'user_id']);
            
            $table->foreign('petshop_id')->references('id')->on('petshops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('petshop_users');
    }
}
