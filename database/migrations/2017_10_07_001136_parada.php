<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PARADA', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('idRuta')->unsigned();
            $table->string('nombre',100);
            $table->string('descripcion',300);
            $table->double('latitud');
            $table->double('longitud');
            $table->foreign('idRuta')->references('id')->on('RUTA')->onDelete('cascade');
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
        Schema::drop('PARADA');
    }
}
