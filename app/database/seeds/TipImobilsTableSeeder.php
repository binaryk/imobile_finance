<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_imobile')->delete();
		$faker = Faker::create(); 
		Imobiliare\Nomenclator\TipImobil::insert([
			['id' => 1, 'nume' => 'Apartament' ],
			['id' => 2, 'nume' => 'Garsoniera' ],
			['id' => 3, 'nume' => 'Casa' ],
			['id' => 4, 'nume' => 'Duplex' ],
			['id' => 5, 'nume' => 'Teren' ],
			['id' => 6, 'nume' => 'Vila' ],
		]);
	}

}