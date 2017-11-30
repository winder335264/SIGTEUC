<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusEnHorariosUCM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HORARIO_UC_M', function (Blueprint $table) {
            $table->string('bus');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('HORARIO_UC_M', function (Blueprint $table) {
            $table->dropColumn('bus');
          
            
        });
    }
}
