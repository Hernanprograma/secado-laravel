<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnadirCamposToMuestrasCamion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('muestras_camion', function (Blueprint $table) {
             $table->string('consigna');
            $table->string('va');
            $table->string('vr');
            $table->string('par');
            $table->string('t_entrada');
            $table->string('t_salida');
            $table->string('vibracion');
            $table->string('caudal_ent');
            $table->string('marcapoli');
            $table->string('caudal_poli');
            $table->string('aspecto');
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
             $table->dropColumn(['consigna', 'va', 'vr','par', 't_entrada', 'vibracion','caudal_ent', 'marcapoli', 'caudal_poli','aspecto']);
        });
    }
}
