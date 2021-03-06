<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGasConsumosForeignKeyUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gas_consumos', function (Blueprint $table) {

           $table->integer('user_id')->nullable()->change();
            
        });

       }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gas_consumos', function (Blueprint $table) {
         $table->dropColumn('user_id');


            //
     });
    }
}
