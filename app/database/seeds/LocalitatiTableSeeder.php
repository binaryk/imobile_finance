<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LocalitatiTableSeeder extends Seeder {

	public function run()
	{
		DB::table('localitati')->delete();
		 
		DB::table('localitati')->insert([
			 ['denumire' => 'Apahida'],
			 ['denumire' => 'Baciu'],
			 ['denumire' => 'Baisoara'],
			 ['denumire' => 'Bogota'],
			 ['denumire' => 'Campenesti'],
			 ['denumire' => 'Campia Turzii'],
			 ['denumire' => 'Cluj-Napoca'],
			 ['denumire' => 'Floresti'],
			 ['denumire' => 'Gilau'],
			 ['denumire' => 'Iclod'],
			 ['denumire' => 'Macau'],
			 ['denumire' => 'Martinesti'],
			 ['denumire' => 'Turda'],
			 ['denumire' => 'Valea Seaca'],
		]);
	}

}