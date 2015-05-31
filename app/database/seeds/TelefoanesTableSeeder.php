<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TelefoanesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('telefoane')->delete();
		$faker = Faker::create();
		$faker->seed(9);
		$intermediari = IntermediarImobil::all()->lists('id');
		$dezvoltatori = Imobiliare\Dezvoltator::all()->lists('id');

		foreach(range(1, 10) as $index)
		{
			Telefon::create([
				'id_intermediar' => $faker->randomElement($intermediari),
				'id_dezvoltator' => $faker->randomElement($dezvoltatori),
				'telefon' => $faker->phoneNumber()
			]);
		}
	}

}