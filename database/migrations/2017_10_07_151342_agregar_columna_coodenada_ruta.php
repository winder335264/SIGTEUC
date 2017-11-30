<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarColumnaCoodenadaRuta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('RUTA', function (Blueprint $table) {
           $table->double('latitud');
            $table->double('longitud');
            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('RUTA', function (Blueprint $table) {
        $table->dropColumn('latitud');
        $table->dropColumn('longitud');
        });
    }
}
