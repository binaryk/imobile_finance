<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FinisajeExterioareSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_finisaje_externe')->delete();
 
			DB::table('tip_finisaje_externe')->insert([
				 ['denumire' => 'Apartament izolat termic'], 
				 ['denumire' => 'Cladire izolata termic']
			]);
	}

}