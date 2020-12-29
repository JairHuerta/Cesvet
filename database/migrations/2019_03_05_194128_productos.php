<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomProducto');
            $table->integer('categoria_id');
            $table->integer('especie_id');
            $table->string('foto');
            $table->text('costo');
            $table->text('descripcion');
            $table->text('existencias');
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
         Schema::dropIfExists('productos');
    }
}
