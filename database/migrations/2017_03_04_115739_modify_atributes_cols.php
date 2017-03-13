<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAtributesCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linea_muestras', function (Blueprint $table) {
            $platform = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
            $platform->registerDoctrineTypeMapping('enum', 'string');
            $table->string('sequedadentrada')->change();
            $table->string('sequedadsalida')->change();
            $table->string('tt4')->nullable()->change();
            $table->string('tt3')->nullable()->change();
            $table->string('tt1')->nullable()->change();
            $table->string('intensidadtambor')->nullable()->change();
            $table->string('tt2')->nullable()->change();
            $table->string('herziosbomba')->nullable()->change();
            $table->string('vueltasbomba')->nullable()->change();
            $table->string('nivelsilo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('linea_muestras', function (Blueprint $table) {
            //
        });
    }
}
