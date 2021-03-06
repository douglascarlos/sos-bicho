<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('raca_id')->unsigned();
            $table->foreign('raca_id')->references('id')->on('racas');
            $table->integer('porte_id')->unsigned();
            $table->foreign('porte_id')->references('id')->on('portes');
            $table->integer('user_cadastro_id')->unsigned();
            $table->foreign('user_cadastro_id')->references('id')->on('users');
            $table->integer('user_adocao_id')->unsigned()->nullable();
            $table->foreign('user_adocao_id')->references('id')->on('users');
            $table->string('nome');
            $table->date('nascimento');
            $table->binary('foto')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
