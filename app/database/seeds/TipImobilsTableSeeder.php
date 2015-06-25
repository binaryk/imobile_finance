<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_imobile')->delete();
		$faker = Faker::create(); 
		Imobiliare\Nomenclator\TipImobil::insert([
			[ 'nume' => 'Apartament,' ],
			[ 'nume' => 'Garsoniera' ],
			[ 'nume' => 'Casa' ],
			[ 'nume' => 'Duplex' ],
			[ 'nume' => 'Teren' ],
		]);
	}

}