<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCategorieImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_categorie_imobil')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\TipCategorieImobil::insert([
			['nume' => 'Cladire'],
			['nume' => 'Apartament'],
			['nume' => 'Teren'],

		]); 
	}

}