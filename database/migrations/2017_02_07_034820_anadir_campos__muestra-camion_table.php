<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnadirCamposMuestraCamionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('muestras_camion', function (Blueprint $table) {
             $table->string('entrada');
            $table->string('salida');
            $table->enum('centrifuga', ['A', 'B', 'C']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('muestras_camion', function (Blueprint $table) {
            //
        });
    }
}
