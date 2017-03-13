<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamposTablaLineaMuestras extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('linea_muestras', function (Blueprint $table) {
            $table->enum('linea', ['A', 'B']);
            $table->dateTime('fechayhora');
            $table->double('sequedadentrada', 4, 2);
            $table->double('sequedadsalida', 4, 2);
            $table->integer('tt4');
            $table->integer('tt3');
            $table->integer('tt1');
            $table->integer('intensidadtambor');
            $table->integer('tt2');
            $table->double('herziosbomba', 3, 1);
            $table->integer('vueltasbomba');
            $table->integer('nivelsilo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('linea_muestras', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('linea');
            $table->dropColumn('fechayhora');
            $table->dropColumn('sequedadentrada');
            $table->dropColumn('sequedadsalida');
            $table->dropColumn('tt4');
            $table->dropColumn('tt3');
            $table->dropColumn('tt1');
            $table->dropColumn('intensidadtambor');
            $table->dropColumn('tt2');
            $table->dropColumn('herziosbomba');
            $table->dropColumn('vueltasbomba');
            $table->dropColumn('nivelsilo');
        });
        //
    }

}
