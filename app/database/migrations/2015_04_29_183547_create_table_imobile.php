<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImobile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('imobile', function(Blueprint $table)
		{
			/*
			-date generale
			 */
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('judet_id');
			$table->bigInteger('localitate_id');
			$table->bigInteger('cartier_id');
			$table->integer('nr_camere');
			$table->text('strada_cladire',255);
			$table->integer('nr_cladire');
			$table->integer('tip_cladire');
			$table->integer('nr_apartament');
			$table->integer('nr_etaje_cladire');
			$table->double('pret_vanzare_euro');
			$table->tinyInteger('pret_negociabil');
			$table->date('data_aparitie_anunt');
			$table->date('data_ultimei_actualizari');
			$table->tinyInteger('valabilitate_oferta');
			$table->text('nume_vanzator',50);
			$table->integer('telefon_1');
			$table->integer('telefon_2');
			$table->tinyInteger('extras_cf');
			$table->text('observatii_generale');
			$table->tinyInteger('credit_prima_casa');
			$table->integer('etaj_apartament');
			$table->integer('compartiment_apartament');
			$table->double('suprafata_apartamnet');
			$table->text('observatii_apartament');
			/*
			-finisaje si dotari
			 */
			$table->integer('finisaje_exterioare');
			$table->integer('finisaje_interioare');
			$table->tinyInteger('gresie_noua');
			$table->tinyInteger('faianta_noua');
			$table->tinyInteger('parchet_nou');
			$table->tinyInteger('zugravit_recent');
			$table->tinyInteger('dotari');
			$table->tinyInteger('usa_metalica');
			$table->tinyInteger('centrala_termica');
			$table->tinyInteger('ferestre_termopan');
			$table->tinyInteger('electrocasnice');
			$table->integer('mobilare');
			$table->text('observatii_finisaje_dotari');

			/*
			-dependente
			 */
			$table->tinyInteger('loc_parcare');
			$table->tinyInteger('beci');
			$table->tinyInteger('terasa');
			$table->tinyInteger('existenta_balcon');
			$table->text('observatii_dotari');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExist('imobile');
	}

}
