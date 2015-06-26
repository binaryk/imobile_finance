<?php

use Faker\Factory as Faker;

class ProprietariPersoaneFiziceSeeder extends Seeder 
{

	public function run()
	{
		DB::table('proprietari_persoane_fizice')->delete();
		$faker = Faker::create();

		for($id = 1; $id <= 1000; $id++)
		{
			Imobiliare\Proprietar::create([
				'id' => $id,
				'nume' => $faker->name,
				'telefon' => $faker->phoneNumber(),
			]);
		}
	}

}