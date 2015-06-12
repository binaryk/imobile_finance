<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipUtilitatiTerenTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_categorie_terenuri')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\TipUtilitatiTeren::insert([
			['nume' => 'Apa'],
			['nume' => 'Canalizare'], 
			['nume' => 'Gaz'], 
			['nume' => 'Curent'],  
		]); 
	}

}