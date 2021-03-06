<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ImobilsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('imobile')->delete();
		$faker = Faker::create();
		$faker->seed(10);
		$categorie = Imobiliare\Nomenclator\TipCategorieImobil::all()->lists('id');
		$tip = Imobiliare\Nomenclator\TipImobil::all()->lists('id');
		$ansamblu = Imobiliare\AnsambluRezidential::all()->lists('id');

		foreach(range(1, 10) as $index)
		{
			Imobiliare\Imobil::create([
				'nume' => $faker->sentence(),
				'id_tip_categorie' => $faker->randomElement($categorie),
				'id_ansamblu' => $faker->randomElement($ansamblu),
				'id_tip_imobil' => $faker->randomElement($tip),
				'suprafata_min' => $faker->numberBetween(1, 100),
				'suprafata_max' => $faker->numberBetween(100, 1000)
			]);
		}
	}

}