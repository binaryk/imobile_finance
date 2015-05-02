<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartierSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
 
			Cartier::create([
				 
			]);
	}

}