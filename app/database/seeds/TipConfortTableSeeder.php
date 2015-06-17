<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipConfortTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_confort')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipConfort::insert([
			['nume' => 'Nespecificat'], 
			['nume' => '1'], 
			['nume' => '2'], 
			['nume' => '3'], 
			['nume' => 'Redus'], 
			['nume' => 'Sporit'], 
			['nume' => 'Unic'], 
		]);
	}

}