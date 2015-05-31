<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipDestinatieCladireSeed extends Seeder {

	public function run()
	{
		DB::table('tip_destinatie_cladire')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipDestinatieCladire::insert([
			['nume' => 'comerciala'],
			['nume' => 'industriala'],
			['nume' => 'apartament']
		]);
	}

}