<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProximasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proximas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pelicula_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proximas');
    }
}
