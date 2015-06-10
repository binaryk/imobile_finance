<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApartamentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('apartamente')->delete();
		$faker = Faker::create();
		$faker->seed(11);
		$imobile = Imobiliare\Imobil::all()->lists('id');
		$org     = Imobiliare\Organizatie::all()->lists('id');
		$judete  = Imobiliare\Nomenclator\Judet::all()->lists('id');
		$cartiere  = Imobiliare\Cartier::all()->lists('id');
		$finisaje_int  = Imobiliare\Nomenclator\TipFinisajeInterioare::all()->lists('id');
		$compartiment  = Imobiliare\Nomenclator\TipCompartiment::all()->lists('id');
		foreach(range(1, 50) as $index)
		{
			Imobiliare\Apartament::create([
				'id_imobil' => $faker->randomElement($imobile),
				'id_organizatie' => $faker->randomElement($org),
				'suprafata_min' => $faker->numberBetween(1, 20),
				'suprafata_max' => $faker->numberBetween(20, 100),
				'id_judet'		=> $faker->randomElement($judete), 
				'id_localitate'		=> $faker->numberBetween(1, 20),
				'id_cartier'		=> $faker->randomElement($cartiere),
				// 'id_cladire'		=> $faker->numberBetween(1, 20), 
				// 'id_proprietar_pf'		=> $faker->
				// 'id_tip_cladire'		=> $faker->
				'id_tip_finisaje_interioare'		=> $faker->randomElement($finisaje_int),
				'id_tip_compartiment'		=> $faker->randomElement($compartiment),
				// 'is_agentie'		=> $faker->
				'oferta_valabila'		=> $faker->numberBetween(0, 1),
				'pret_m2'		=> $faker->numberBetween(15, 150),
				'ultima_actualizare'		=> \Carbon\Carbon::now()->format('Y-m-d'), 
				'email'		=> $faker->email(),
				'telefon'		=> $faker->phoneNumber(),
				'telefon_secundar_1'		=> $faker->phoneNumber(),
				'telefon_secundar_2'		=> $faker->phoneNumber(),
				'nr_camere'		=> $faker->numberBetween(1, 5),
				'credit_prima_casa'		=> $faker->boolean($chanceOfGettingTrue = 20),
				'nr_etaj'		=> $faker->numberBetween(1, 10),
				'nr_balcoane'		=> $faker->numberBetween(1, 3),
				'anul_constructiei'		=> $faker->year($max = 'now'),
				'nr_bai'		=> $faker->numberBetween(1, 3),
				'detalii_bacoane'		=> $faker->text(),
				// 'id_sistem_incalzire'		=> $faker->
				'are_termopane'		=> $faker->boolean($chanceOfGettingTrue = 20),
				'parcare'		=> $faker->text(), 
				'zona_aproximativa'		=> $faker->address(),
				'adresa_exacta'		=> $faker->address(),
				'detalii'		=> $faker->text(),
				'detalii_private'		=> $faker->text()
			]); 
		}
	}

}