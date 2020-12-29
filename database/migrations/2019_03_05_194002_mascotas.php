<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mascotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('sexo');
            $table->string('nomDueno');
            $table->string('especie');
            $table->text('edad');
            $table->text('cita');
            $table->text('hora');
            $table->string('amistoso');
            $table->text('comentarios');
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
        Schema::dropIfExists('mascotas');
    }
}
