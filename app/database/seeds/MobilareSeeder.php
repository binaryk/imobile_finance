
<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MobilareSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_mobilare')->delete();

		DB::table('tip_mobilare')->insert([
			 ['denumire' => 'Mobilat'],
			 ['denumire' => 'Nemobilat'],
			 ['denumire' => 'Semimobilat'],
			 ['denumire' => 'Supermobilat'],
		]);
	}
}