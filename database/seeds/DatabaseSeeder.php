<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //$this->call(linea_muestras_Seeder::class);
        //LineaMuestra::unguard();
        factory('proyectoPrueba\User', 10)->create();

// $this->call('UserTableSeeder');
        // LineaMuestra::reguard();
    }

}
