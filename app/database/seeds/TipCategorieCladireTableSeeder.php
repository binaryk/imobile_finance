<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCategorieCladireTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_categorii_cladire')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\TipCategorieCladire::insert([
			['nume' => 'bloc'],
			['nume' => 'casa'],
			['nume' => 'vila'],
			['nume' => 'duplex'],

		]); 
	}

}