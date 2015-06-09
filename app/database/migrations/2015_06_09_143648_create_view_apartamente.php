<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewApartamente extends Migration 
{
	
	public function up()
	{
		DB::statement("DROP VIEW IF EXISTS `v_apartamente`");
		DB::statement("
			CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` 
			VIEW `v_apartamente` 
			AS 
			select
				apartamente.id,
				apartamente.id_organizatie, 
				organizatii.denumire as organizatia,
				apartamente.id_tip_finisaje_interioare,
				tip_finisaje_interioare.nume as finisaj_interior,
				apartamente.id_tip_compartiment,
				tip_compartiment.nume as tip_compartiment,
				apartamente.oferta_valabila,
				judete.nume as judet,
				localitati.nume as localitate,
				apartamente.adresa_exacta,
				apartamente.nr_camere,
				apartamente.pret_m2,
				apartamente.is_agentie,
				apartamente.ultima_actualizare,
				apartamente.telefon,
				apartamente.telefon_secundar_1,
				apartamente.telefon_secundar_2,
				apartamente.credit_prima_casa,
				apartamente.nr_etaj
			from apartamente
			left join organizatii on apartamente.id_organizatie = organizatii.id
			left join judete on apartamente.id_judet = judete.id
			left join localitati on apartamente.id_localitate = localitati.id
			left join tip_finisaje_interioare on apartamente.id_tip_finisaje_interioare = tip_finisaje_interioare.id
			left join tip_compartiment on apartamente.id_tip_compartiment = tip_compartiment.id
			where apartamente.deleted_at is null
		");
	}

	
	public function down()
	{
		DB::statement("DROP VIEW IF EXISTS `v_apartamente`");
	}

}