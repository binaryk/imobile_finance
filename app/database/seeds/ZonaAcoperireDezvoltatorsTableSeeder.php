<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ZonaAcoperireDezvoltatorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('zona_acoperire_dezvoltatori')->delete();
		$faker = Faker::create();
		$faker->seed(6);
		$judete = Judet::all()->lists('id');
		$dezvoltatori = Dezvoltator::all()->lists('id');

		foreach(range(1, 10) as $index)
		{
			ZonaAcoperireDezvoltatori::create([
				'id_judet' => $faker->randomElement($judete),
				'id_dezvoltator' => $faker->randomElement($dezvoltatori),
				'telefon' => $faker->phoneNumber()
			]);
		}
	}

}