<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipFinisajeInterioareTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_finisaje_interioare')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipFinisajeInterioare::insert([
			['nume' => 'Nefinisat'],
			['nume' => 'Semifinisat'],
			['nume' => 'Finisat'],
			['nume' => 'Superfinisat'],
		]);

	}

}