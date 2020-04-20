<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->string('NumeroTarjeta');
            $table->string('Banco');
            $table->string('Correo');
            $table->string('Foto');
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
        Schema::dropIfExists('usuarios');
    }
}
