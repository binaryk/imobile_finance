<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AnsambluRezidentialsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('ansambluri_rezidentiale')->delete();
		$faker = Faker::create();
		$faker->seed(3);
		$tip_stadii = Imobiliare\Nomenclator\TipStadiuAnsamblu::all()->lists('id');
		$dezvoltatori = Imobiliare\Dezvoltator::all()->lists('id');
		$organizatii = Organizatie::all()->lists('id');
		foreach(range(1, 10) as $index)
		{
			AnsambluRezidential::create([
				'nume' => $faker->company,
				'telefon' => $faker->phoneNumber(),
				'id_tip_stadiu_ansamblu'=> $faker->randomElement($tip_stadii),
				'id_dezvoltator' => $faker->randomElement($dezvoltatori),
				'id_organizatie' => $faker->randomElement($organizatii),
				'strada' => $faker->address()
			]);
		}
	}

}