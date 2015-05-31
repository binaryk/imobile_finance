<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipEtajsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_etaje')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipEtaj::insert([
			['nume' => '1'],
			['nume' => '2'],
			['nume' => '3'],
			['nume' => '4'],
			['nume' => '5'],
			['nume' => '6'],
			['nume' => '7'],
		]);

	}

}