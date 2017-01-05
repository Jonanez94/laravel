<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('correo')->unique();
            $table->integer('edad');
            $table->string('password', 60);
            $table->string('direccion', 60);
            $table->string('observaciones', 60);
            $table->rememberToken();
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
        Schema::drop('lectores');
    }
}
