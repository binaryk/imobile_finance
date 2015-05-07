<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class IntermediarImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('intermediari_imobile')->delete();
		$faker = Faker::create();
		$faker->seed(7);
		$judete = Judet::all()->lists('id');
		$tip_intemediar = TipIntermediar::all()->lists('id');

		foreach(range(1, 10) as $index)
		{
			IntermediarImobil::create([
				'id_tip_intermediar' => $faker->randomElement($tip_intemediar),
				'id_judet' => $faker->randomElement($judete)
			]);
		}
	}

}