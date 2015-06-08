<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartiersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cartiere')->delete();
		$faker = Faker::create();
		Imobiliare\Cartier::insert([
			['nume' => 'Grigorescu'],
			['nume' => 'Gheorghieni'],
			['nume' => 'Buna ziua'],
			['nume' => 'Marasti'],
			['nume' => 'Observator'],
		]);
	}

}