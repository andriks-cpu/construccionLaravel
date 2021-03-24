<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();

            $table->string('Titulo');
            $table->string('Autor');
            $table->string('Descripcion');
            $table->string('Portada');
            $table->text('DescripcionLarga');
            $table->string('ISBN');
            $table->string('Editorial');
            $table->string('NumeroPaginas');
            $table->string('Edicion');
            $table->string('Pais');
            $table->string('Año');

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
        Schema::dropIfExists('libros');
    }
}
