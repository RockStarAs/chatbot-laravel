<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaComando extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandos', function (Blueprint $table) {
            $table->id();
            $table->string('comando'); //Para guardar el comando como texto -> por ejemplo /cmd, /clear cosas así 
            $table->string('tipo_respuesta');//El tipo de respuesta puede ser texto o archivo, esto lo veré más adelante
            $table->string('respuesta');//La respuesta que el bot piensa dar como mensaje
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comandos');
    }
}
