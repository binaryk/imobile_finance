<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JudetTableSeeder extends Seeder {
	protected $judete = [
		['nume' => 'Alba'],
		['nume' => 'Arad'],
		['nume' => 'Arges'],
		['nume' => 'Bacau'],
		['nume' => 'Bihor'],
		['nume' => 'Bistrita-Nasaud'],
		['nume' => 'Botosani'],
		['nume' => 'Brasov'],
		['nume' => 'Braila'],
		['nume' => 'Buzau'],
		['nume' => 'Caras-Severin'],
		['nume' => 'Cluj'],
		['nume' => 'Constanta'],
		['nume' => 'Covasna'],
		['nume' => 'Dimbovita'],
		['nume' => 'Dolj'],
		['nume' => 'Galati'],
		['nume' => 'Gorj'],
		['nume' => 'Harghita'],
		['nume' => 'Hunedoara'],
		['nume' => 'Ialomita'],
		['nume' => 'Iasi'],
		['nume' => 'Ilfov'],
		['nume' => 'Maramures'],
		['nume' => 'Mehedinti'],
		['nume' => 'Mures'],
		['nume' => 'Neamt'],
		['nume' => 'Olt'],
		['nume' => 'Prahova'],
		['nume' => 'Satu-Mare'],
		['nume' => 'Salaj'],
		['nume' => 'Sibiu'],
		['nume' => 'Suceava'],
		['nume' => 'Teleorman'],
		['nume' => 'Timis'],
		['nume' => 'Tulcea'],
		['nume' => 'Vaslui'],
		['nume' => 'Vilcea'],
		['nume' => 'Vrancea'],
		['nume' => 'Bucuresti'],
		['nume' => 'Calarasi'],
		['nume' => 'Giurgiu'],
	];
	public function run()
	{
		DB::table('judete')->delete();
		$faker = Faker::create();
		Judet::insert($this->judete); 
	}

}