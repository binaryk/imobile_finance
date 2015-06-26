<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTelefoane extends Migration
{

	public function up()
	{
		DB::statement("DROP VIEW IF EXISTS `v_telefoane`");
		DB::statement("
			CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` 
			VIEW `v_telefoane` 
			AS 
			select
				id,
				telefon,
				nume,
				'Agenţie' as phone_type
			from agentii
			where agentii.deleted_at is null
			union
			select
				id,
			   telefon,
			   nume,
			   'Persoana fizică' as phone_type
			from proprietari_persoane_fizice
			where proprietari_persoane_fizice.deleted_at is null
			order by telefon
		");
	}

	
	public function down()
	{
		DB::statement("DROP VIEW IF EXISTS `v_telefoane`");
	}

}