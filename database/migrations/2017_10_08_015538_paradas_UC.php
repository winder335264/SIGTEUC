<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParadasUC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('PARADA_UC', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('nombre',100);
            $table->double('latitud');
            $table->double('longitud');
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
        Schema::drop('PARADA_UC');
    }
}
