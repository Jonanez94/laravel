<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_lector')->unsigned();
            $table->integer('fk_libro')->unsigned();
            $table->date('fecha_salida');
            $table->date('fecha_entrada');

            $table->foreign('fk_lector')->references('id')->on('lectores')->onDelete('cascade');
            $table->foreign('fk_libro')->references('id')->on('libros')->onDelete('cascade');
            
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
        Schema::drop('alquileres');
    }
}
