<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->text('imagen_url');
            $table->string('nombre_pelicula');
            //$table->string('informacion_basica');
            $table->text('sinopsis');
            $table->float('puntaje')->default(0);
            $table->integer('anio');
            $table->string('genero');
            $table->string('duracion');
            $table->integer('cantidad_votos')->default(0);
            $table->text('url_trailer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
