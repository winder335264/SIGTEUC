<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateparadasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paradas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRuta');
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('latitud');
            $table->double('longitud');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paradas');
    }
}
