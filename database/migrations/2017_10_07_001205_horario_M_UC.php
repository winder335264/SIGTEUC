<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HorarioMUC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('HORARIO_M_UC', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('idRuta')->unsigned();
            $table->time('hora');
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
        Schema::drop('HORARIO_M_UC');

    }
}
