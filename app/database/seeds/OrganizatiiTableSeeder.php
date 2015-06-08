<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrganizatiiTableSeeder extends Seeder {

	public function run()
	{
		DB::table('organizatii')->delete();
		$faker = Faker::create();
		$faker->seed(2);
		$localitati = Imobiliare\Nomenclator\Localitate::all()->lists('id');
		foreach(range(1, 10) as $index)
		{
			Imobiliare\Organizatie::create([
				'id_localitate' => $faker->randomElement($localitati),
				'denumire' => $faker->company,
				'telefon' => $faker->unique()->phoneNumber(),
				'fax' => $faker->phoneNumber(),
				'adresa' => $faker->address(),
				'email' => $faker->unique()->email(),
				'anul_infiintarii' => $faker->year(),
			]);
		}
	}

}