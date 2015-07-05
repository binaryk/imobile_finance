<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartiersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cartiere')->delete();
		$faker = Faker::create();
		Imobiliare\Cartier::insert([
			// 5350 id-ul localitatii Cluj Napoca
			[
			'id' => 1,
			'id_localitate' => 5350,
			'nume' => 'Andrei Muresanu'
			],
			[
			'id' => 2,
			'id_localitate' => 5350,
			'nume' => 'Apahida'
			],
			[
			'id' => 3,
			'id_localitate' => 5350,
			'nume' => 'Buna Ziua'
			],
			[
			'id' => 4,
			'id_localitate' => 5350,
			'nume' => 'Borhanci'
			],
			[
			'id' => 5,
			'id_localitate' => 5350,
			'nume' => 'Baciu'
			],
			[
			'id' => 6,
			'id_localitate' => 5350,
			'nume' => 'Bulgaria'
			],
			[
			'id' => 7,
			'id_localitate' => 5350,
			'nume' => 'Centru'
			],
			[
			'id' => 8,
			'id_localitate' => 5350,
			'nume' => 'Dambul Rotund'
			],
			[
			'id' => 9,
			'id_localitate' => 5350,
			'nume' => 'Dezmir'
			],
			[
			'id' => 10,
			'id_localitate' => 5350,
			'nume' => 'Europa'
			],
			[
			'id' => 11,
			'id_localitate' => 5350,
			'nume' => 'Floresti'
			],
			[
			'id' => 12,
			'id_localitate' => 5350,
			'nume' => 'Faget'
			],
			[
			'id' => 13,
			'id_localitate' => 5350,
			'nume' => 'Gruia'
			],
			[
			'id' => 14,
			'id_localitate' => 5350,
			'nume' => 'Gheorgheni'
			],
			[
			'id' => 15,
			'id_localitate' => 5350,
			'nume' => 'Grigorescu'
			],
			[
			'id' => 16,
			'id_localitate' => 5350,
			'nume' => 'Iris'
			],
			[
			'id' => 17,
			'id_localitate' => 5350,
			'nume' => 'Intre Lacuri'
			],
			[
			'id' => 18,
			'id_localitate' => 5350,
			'nume' => 'Manastur'
			],
			[
			'id' => 19,
			'id_localitate' => 5350,
			'nume' => 'Marasti'
			],
			[
			'id' => 20,
			'id_localitate' => 5350,
			'nume' => 'Plopilor'
			],
			[
			'id' => 21,
			'id_localitate' => 5350,
			'nume' => 'Someseni'
			],
			[
			'id' => 22,
			'id_localitate' => 5350,
			'nume' => 'Sopor'
			],
			[
			'id' => 23,
			'id_localitate' => 5350,
			'nume' => 'Zorilor'
			] ,
			[
			'id' => 24,
			'id_localitate' => 5350,
			'nume' => 'Gara'
			] 
		]);
	}

}