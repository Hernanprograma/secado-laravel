<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaudalesSimbioticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simbiotica_caudales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('operario');
            $table->string('caudal');
            $table->string('totalizado');
            $table->dateTime('hora');
            $table->string('incidencias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simbiotica_caudales');
    }
}
