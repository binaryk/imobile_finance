<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipDestinatieTerenSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_categorie_terenuri')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\TipDestinatieTeren::insert([
			['nume' => 'pasune'],
			['nume' => 'case'], 
		]); 
	}

}