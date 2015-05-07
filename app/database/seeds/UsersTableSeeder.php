<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();
		$faker = Faker::create();
		$faker->seed(1);
		$organizatii = Organizatie::all()->lists('id');
		foreach(range(1, 10) as $index)
		{
			User::create([
				'id_organizatie' => $faker->randomElement($organizatii),
				'nume' => $faker->lastName(),
				'prenume' => $faker->firstName(),
				'adresa'  => $faker->address(),
				'email'   => $faker->unique()->email(),
				'telefon' => $faker->phoneNumber(),
				'password'=>'secret'
			]);
		}
	}

}