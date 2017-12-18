<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificarHorarioMUCHora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('HORARIO_M_UC', function (Blueprint $table) {
            $table->string('Horas');
           
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
        $table->dropColumn('Horas');
        });
    }
}
