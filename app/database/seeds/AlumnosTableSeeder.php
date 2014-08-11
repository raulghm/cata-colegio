<?php

use Faker\Factory as Faker;

class AlumnosTableSeeder extends Seeder {

    public function run() {

      $faker = Faker::create('es_ES');

      foreach(range(1, 100) as $index)
      {
        Alumno::create([
        	'nombre' => $faker->name
        ]);
      }
    }
}