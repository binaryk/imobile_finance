<?php

use Faker\Factory as Faker;

class LocalitatiTableSeeder extends Seeder 
{
	protected $localitati = [ 
		[
			'id' => 5350,
			'id_judet' => 12,
			'nume'	=> 'Cluj-Napoca'
		]

	];
	
	public function run()
	{
		DB::table('localitati')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\Localitate::insert($this->localitati); 
	}

}