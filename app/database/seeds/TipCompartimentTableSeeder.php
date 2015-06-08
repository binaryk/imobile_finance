<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCompartimentTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_compartiment')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipCompartiment::insert([
			['nume' => 'decomandat'],
			['nume' => 'semidecomandat'],
			['nume' => 'nedecomandat'],
			['nume' => 'circuit'],
			['nume' => 'vagon']
		]);
	}

}