<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipFinisajeInterioareTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_finisaje_interioare')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipFinisajeInterioare::insert([
			['id' => 1, 'nume' => 'Nefinisat'],
			['id' => 2, 'nume' => 'Semifinisat'],
			['id' => 3, 'nume' => 'Finisat'],
			['id' => 4, 'nume' => 'Superfinisat'],
		]);

	}

}