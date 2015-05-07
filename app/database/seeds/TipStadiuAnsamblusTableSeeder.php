<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipStadiuAnsamblusTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tip_stadii_ansamblu')->delete();
		$faker = Faker::create();
		 
		TipStadiuAnsamblu::insert([
			['nume' => 'Neinceput'],
			['nume' => 'In constructie'],
			['nume' => 'Finalizat']
		]);
	}

}