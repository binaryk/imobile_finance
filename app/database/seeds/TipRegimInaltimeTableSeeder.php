<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipRegimInaltimeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_regim_inaltime_cladire')->delete();
		$faker = Faker::create(); 
		 Imobiliare\Nomenclator\TipRegimInaltime::insert([
			['nume' => 'Cu demisol'],
			['nume' => 'Fara demisol'],
			['nume' => 'Cu subsol'],
			['nume' => 'Fara subsol'],
		]);
	}

}