<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarDescripcionParadaUc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PARADA_UC', function (Blueprint $table) {
           $table->string('descripcion');
            
            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('PARADA_UC', function (Blueprint $table) {
        $table->string('descripcion');
        });
    }
}
