<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipClasificareTerenTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_categorie_terenuri')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\TipClasificareTeren::insert([
			['nume' => 'Intravilan'],
			['nume' => 'Extravilan'],  
		]); 
	}

}