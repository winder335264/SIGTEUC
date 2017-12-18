<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHORARIO_M_UCSTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_o_r_a_r_i_o__m__u_c_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRuta');
            $table->string('Horas');
            $table->string('bus');
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
        Schema::drop('h_o_r_a_r_i_o__m__u_c_s');
    }
}
