<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipGarajTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_garaj')->delete();
		$faker = Faker::create(); 
		 Imobiliare\Nomenclator\TipGaraj::insert([
			['nume' => 'Nespecificat'], 
			['nume' => 'Sub bloc'], 
			['nume' => 'Beton'], 
			['nume' => 'Caramida'], 
			['nume' => 'Tabla'], 
			['nume' => 'Copertina'], 

		]);
	}

}