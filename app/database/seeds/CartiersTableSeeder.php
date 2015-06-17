<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartiersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cartiere')->delete();
		$faker = Faker::create();
		Imobiliare\Cartier::insert([
			['nume' => 'Andrei Muresanu'],
			['nume' => 'Apahida'],
			['nume' => 'Baciu'],
			['nume' => 'Baisoara'],
			['nume' => 'Becas'],
			['nume' => 'Belis'],
			['nume' => 'Borhanci'],
			['nume' => 'Bulgaria'],
			['nume' => 'Buna-Ziua'],
			['nume' => 'Centru'],
			['nume' => 'Chinteni'],
			['nume' => 'Dambul-Rotund'],
			['nume' => 'Europa'],
			['nume' => 'Faget'],
			['nume' => 'Feleacu'],
			['nume' => 'Floresti'],
			['nume' => 'Gara'],
			['nume' => 'Gheorgheni'],
			['nume' => 'Gilau'],
			['nume' => 'Grigorescu'],
			['nume' => 'Gruia'],
			['nume' => 'Iris'],
			['nume' => 'Jucu'],
			['nume' => 'Manastur'],
			['nume' => 'Marasti'],
			['nume' => 'Plopilor'],
			['nume' => 'Someseni'],
			['nume' => 'Sopor'],
			['nume' => 'Zorilor'] 
		]);
	}

}