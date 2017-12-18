<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusEnHorariosMUC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('HORARIO_M_UC', function (Blueprint $table) {
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
         Schema::table('HORARIO_M_UC', function (Blueprint $table) {
            $table->dropColumn('bus');
          
            
        });
    }
}
