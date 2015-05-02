<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CartierSeeder extends Seeder {

	public function run()
	{
		DB::table('cartier')->where('id','<','70')->update([
			'localitate_id' => '5350'
		]); 
	}
}