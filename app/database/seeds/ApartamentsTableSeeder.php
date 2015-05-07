<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApartamentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('apartamente')->delete();
		$faker = Faker::create();
		$faker->seed(11);
		$imobile = Imobil::all()->lists('id');
		$org     = Organizatie::all()->lists('id');
		foreach(range(1, 10) as $index)
		{
			Apartament::create([
				'id_imobil' => $faker->randomElement($imobile),
				'id_organizatie' => $faker->randomElement($org),
				'suprafata_min' => $faker->numberBetween(1, 20),
				'suprafata_max' => $faker->numberBetween(20, 100)
			]);
		}
	}

}