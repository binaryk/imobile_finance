<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JudetTableSeeder extends Seeder {
	protected $judete = [
		[ 'id' => '1', 'nume' => 'Alba'],			
		[ 'id' => '2', 'nume' => 'Arad'],			
		[ 'id' => '3', 'nume' => 'Arges'],			
		[ 'id' => '4', 'nume' => 'Bacau'],			
		[ 'id' => '5', 'nume' => 'Bihor'],			
		[ 'id' => '6', 'nume' => 'Bistrita-Nasaud'],			
		[ 'id' => '7', 'nume' => 'Botosani'],			
		[ 'id' => '8', 'nume' => 'Brasov'],			
		[ 'id' => '9', 'nume' => 'Braila'],			
		[ 'id' => '10', 'nume' => 'Buzau'],			
		[ 'id' => '11', 'nume' => 'Caras-Severin'],			
		[ 'id' => '12', 'nume' => 'Cluj'],			
		[ 'id' => '13', 'nume' => 'Constanta'],			
		[ 'id' => '14', 'nume' => 'Covasna'],			
		[ 'id' => '15', 'nume' => 'Dimbovita'],			
		[ 'id' => '16', 'nume' => 'Dolj'],			
		[ 'id' => '17', 'nume' => 'Galati'],			
		[ 'id' => '18', 'nume' => 'Gorj'],			
		[ 'id' => '19', 'nume' => 'Harghita'],			
		[ 'id' => '20', 'nume' => 'Hunedoara'],			
		[ 'id' => '21', 'nume' => 'Ialomita'],			
		[ 'id' => '22', 'nume' => 'Iasi'],			
		[ 'id' => '23', 'nume' => 'Ilfov'],			
		[ 'id' => '24', 'nume' => 'Maramures'],			
		[ 'id' => '25', 'nume' => 'Mehedinti'],			
		[ 'id' => '26', 'nume' => 'Mures'],
		[ 'id' => '27', 'nume' => 'Neamt'],
		[ 'id' => '28', 'nume' => 'Olt'],
		[ 'id' => '29', 'nume' => 'Prahova'],
		[ 'id' => '30', 'nume' => 'Satu-Mare'],
		[ 'id' => '31', 'nume' => 'Salaj'],
		[ 'id' => '32', 'nume' => 'Sibiu'],
		[ 'id' => '33', 'nume' => 'Suceava'],
		[ 'id' => '34', 'nume' => 'Teleorman'],
		[ 'id' => '35', 'nume' => 'Timis'],
		[ 'id' => '36', 'nume' => 'Tulcea'],
		[ 'id' => '37', 'nume' => 'Vaslui'],
		[ 'id' => '38', 'nume' => 'Vilcea'],
		[ 'id' => '39', 'nume' => 'Vrancea'],
		[ 'id' => '40', 'nume' => 'Bucuresti'],
		[ 'id' => '41', 'nume' => 'Calarasi'],
		[ 'id' => '42', 'nume' => 'Giurgiu'],
	];
	public function run()
	{
		DB::table('judete')->delete();
		$faker = Faker::create();
		Imobiliare\Nomenclator\Judet::insert($this->judete); 
	}

}