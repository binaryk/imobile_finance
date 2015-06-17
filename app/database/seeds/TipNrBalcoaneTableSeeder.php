<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipNrBalcoaneTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_nr_balcoane')->delete();
		$faker = Faker::create(); 
		 Imobiliare\Nomenclator\TipNrBalcoane::insert([
			['nume' => 'Nespecificat'],  
			['nume' => '1'],  
			['nume' => '2'],  
			['nume' => '3'],  
			['nume' => 'Balcon inchis'],  
			['nume' => 'Balcoane inchise'],  
			['nume' => 'Fara balcon'],  
			['nume' => 'Terasa'] 

		]);
	}

}