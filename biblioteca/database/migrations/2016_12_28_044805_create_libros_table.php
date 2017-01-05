<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('titulo',80);
            $table->date('fecha_lanzamiento');
            $table->integer('fk_autor')->unsigned();
            $table->integer('fk_categoria')->unsigned();
            $table->integer('fk_editorial')->unsigned();
            $table->string('descripcion',100);
            $table->integer('paginas');

            $table->foreign('fk_autor')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('fk_categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('fk_editorial')->references('id')->on('editoriales')->onDelete('cascade');

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
        Schema::drop('libros');
    }
}
