<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class linea_muestras_Seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            \DB::table('linea_muestras')->insert(array(
                'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
                'updated_at' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
                'linea' => $faker->randomElement(['A', 'B']),
                'fechayhora' => date('Y-m-d H:m:s'),
                'sequedadentrada' => $faker->randomFloat($nbMaxDecimals = 2, $min = 16, $max = 21),
                'sequedadsalida' => $faker->randomFloat($nbMaxDecimals = 2, $min = 76, $max = 98),
                'tt4' => $faker->numberBetween($min = 275, $max = 277),
                'tt3' => $faker->numberBetween($min = 239, $max = 250),
                'tt1' => $faker->numberBetween($min = 120, $max = 160),
                'intensidadtambor' => $faker->numberBetween($min = 60, $max = 170),
                'tt2' => $faker->numberBetween($min = 37, $max = 55),
                'herziosbomba' => $faker->numberBetween($min = 30, $max = 50),
                'vueltasbomba' => $faker->numberBetween($min = 20, $max = 40),
                'nivelsilo' => $faker->numberBetween($min = 0, $max = 95)
            ));
        }
    }

}
