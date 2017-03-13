<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasConsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_consumos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('receptora_lectura');
            $table->string('receptora_vb');
            $table->string('receprota_vm');

            $table->string('caldera');
            $table->string('caldera_vbt');
            $table->string('caldera_vmt');

            $table->string('coogeneracion_lectura');
            $table->string('coogeneracion_vbt');
            $table->string('coogeneracion_vmt');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_consumos');
    }
}
