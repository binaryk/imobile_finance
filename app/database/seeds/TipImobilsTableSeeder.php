<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_imobile')->delete();
		$faker = Faker::create(); 
		Imobiliare\Nomenclator\TipImobil::insert([
			[ 'nume' => '1 camera' ],
			[ 'nume' => '2 camere' ],
			[ 'nume' => '3 camere' ],
			[ 'nume' => '4 camere' ],
			[ 'nume' => '5 camere' ],
			[ 'nume' => '6 camere' ],
			[ 'nume' => '7 camere' ],
			[ 'nume' => '8 camere' ],
			[ 'nume' => '9 camere' ]
		]);
	}

}