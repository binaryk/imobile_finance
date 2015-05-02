<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CamereSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_nr_camere')->delete();
 
			DB::table('tip_nr_camere')->insert([
				 ['nr_camere' => '1'],
				 ['nr_camere' => '2'],
				 ['nr_camere' => '3'],
				 ['nr_camere' => '4'],
				 ['nr_camere' => '5'],
				 ['nr_camere' => '6'],
				 ['nr_camere' => '7'],
				 ['nr_camere' => 'Casa/vila'],
				 ['nr_camere' => 'Garsoniera'],

			]);
	}

}