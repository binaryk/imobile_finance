<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipIntermediariTableSeeder extends Seeder {

	public function run()
	{
		DB::table('intermediari_imobile')->delete();
		$faker = Faker::create(); 
		 Imobiliare\Nomenclator\TipIntermediar::insert([
			['nume' => 'Agentie'],
			['nume' => 'Persoana fizica'],
		]);
	}

}