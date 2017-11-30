<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistanciaDuracionFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('RUTA', function (Blueprint $table) {
            $table->float('distancia');
            $table->float('duracion');
            
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
            $table->dropColumn('distancia');
            $table->dropColumn('duracion');
            
        });
    }
}
