<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipEtajSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_etaj')->delete();
 
			DB::table('tip_etaj')->insert([
				 ['denumire' => 'Subsol'],
				 ['denumire' => 'Demisol'],
				 ['denumire' => 'Parter'],
				 ['denumire' => 'Parter inalt'],
				 ['denumire' => 'Mezanin'],
				 ['denumire' => 'Etaj 1'],
				 ['denumire' => 'Etaj 2'],
				 ['denumire' => 'Etaj 3'],
				 ['denumire' => 'Etaj 4'],
				 ['denumire' => 'Etaj 5'],
				 ['denumire' => 'Etaj 7'],
				 ['denumire' => 'Etaj 8'],
				 ['denumire' => 'Etaj 9'],
				 ['denumire' => 'Etaj 10'],
				 ['denumire' => 'Etaj 11'],
				 ['denumire' => 'Mansarda'],
				 ['denumire' => 'Etaj + Mansarda'],
			]);
	}

}