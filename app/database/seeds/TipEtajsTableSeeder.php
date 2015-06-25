<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipEtajsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_etaje')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipEtaj::insert([
			['nume' => 'Nespecificat'], 
			['nume' => 'Demisol'], 
			['nume' => 'Parter'], 
			['nume' => 'Parter înalt'], 
			['nume' => 'Etajul 1'], 
			['nume' => 'Etajul 2'], 
			['nume' => 'Etajul 3'], 
			['nume' => 'Etajul 4'], 
			['nume' => 'Etajul 5'], 
			['nume' => 'Etajul 6'], 
			['nume' => 'Etajul 7'], 
			['nume' => 'Etajul 8'], 
			['nume' => 'Etajul 9'], 
			['nume' => 'Etajul 10'], 
			['nume' => 'Etaj intermediar'], 
			['nume' => 'Ultimul etaj'], 
			['nume' => 'Mansarda'],  
		]);

	}

}