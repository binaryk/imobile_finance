<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NrEtajeSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_nr_etaje')->delete();
		 
		DB::table('tip_nr_etaje')->insert([
			 ['nr_etaje' => '1'],
			 ['nr_etaje' => '2'],
			 ['nr_etaje' => '3'],
			 ['nr_etaje' => '4'],
			 ['nr_etaje' => '5'],
			 ['nr_etaje' => '6'],
			 ['nr_etaje' => '7'],
			 ['nr_etaje' => '8'],
			 ['nr_etaje' => '9'],
			 ['nr_etaje' => '10'],
			 ['nr_etaje' => '11'],
			 ['nr_etaje' => '12'],
		]);
	}

}