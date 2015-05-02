<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCompartimentSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_compartiment')->delete();
 
			DB::table('tip_compartiment')->insert([
				 ['denumire' => 'Decomandat'],
				 ['denumire' => 'In circuit'],
				 ['denumire' => 'Semidecomandat']
			]);
	}

}