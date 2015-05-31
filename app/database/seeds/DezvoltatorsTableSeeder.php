<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DezvoltatorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('dezvoltatori')->delete();
		$faker = Faker::create();
		$faker->seed(5);
		$judete = Imobiliare\Nomenclator\Judet::all()->lists('id');

		foreach(range(1, 10) as $index)
		{
			Imobiliare\Dezvoltator::create([
				'id_judet' => $faker->randomElement($judete),
				'nume' => $faker->lastName(),
				'prenume' => $faker->firstName(),
				'adresa' => $faker->address(),
				'telefon' => $faker->phoneNumber(),
				'email' => $faker->unique()->email()
			]);
		}
	}

}