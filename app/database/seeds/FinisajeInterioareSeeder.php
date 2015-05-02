<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FinisajeInterioareSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_finisaje_interne')->delete();
 
			DB::table('tip_finisaje_interne')->insert([
				 ['denumire' => 'Finisat'], 
				 ['denumire' => 'Nefinisat'], 
				 ['denumire' => 'Semifinisat'], 
				 ['denumire' => 'Superfinisat'] 
			]);
	}

}