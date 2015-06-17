<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipAcoperisTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_acoperis')->delete();
		$faker = Faker::create();
		 
		Imobiliare\Nomenclator\TipAcoperis::insert([
			['nume' => 'Tabla'],   
			['nume' => 'Tigla Bramac'],   
			['nume' => 'Tigla Ceramica Mediteraneana'],   
			['nume' => 'Tigla clasica'],   
			['nume' => 'Tigla metalica'],   
			['nume' => 'Nespecificat'],   
			['nume' => 'Nu are'],   
		]);

	}

}