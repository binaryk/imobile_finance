<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCompartimentTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_compartiment')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipCompartiment::insert([
			[ 'id' => 1, 'nume' => 'Decomandat'],
			[ 'id' => 2, 'nume' => 'Semidecomandat'],
			[ 'id' => 3, 'nume' => 'Nedecomandat'],
			[ 'id' => 4, 'nume' => 'Circuit'],
			[ 'id' => 5, 'nume' => 'Vagon']
		]);
	}

}