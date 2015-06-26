<?php

use Faker\Factory as Faker;

class AgentiiSeeder extends Seeder 
{

	public function run()
	{
		DB::table('agentii')->delete();
		$faker = Faker::create();

		for($id = 1; $id <= 1000; $id++)
		{
			Imobiliare\Agentie::create([
				'id' => $id,
				'nume' => $faker->company,
				'telefon' => $faker->phoneNumber(),
			]);
		}
	}

}