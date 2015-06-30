<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartiersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cartiere')->delete();
		$faker = Faker::create();
		Imobiliare\Cartier::insert([
			[
			'id_localitate' => 5350,
			'nume' => 'Andrei Muresanu'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Apahida'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Buna Ziua'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Borhanci'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Baciu'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Bulgaria'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Centru'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Dambul Rotund'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Dezmir'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Europa'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Floresti'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Faget'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Gruia'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Gheorgheni'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Grigorescu'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Iris'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Intre Lacuri'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Manastur'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Marasti'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Plopilor'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Someseni'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Sopor'
			],
			[
			'id_localitate' => 5350,
			'nume' => 'Zorilor'
			] 
		]);
	}

}