<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsApartamente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function(Blueprint $t){
			$t->tinyInteger('id_tip_utilitati_existente')->unsigned();
			$t->tinyInteger('front_strada_principala');
			$t->tinyInteger('existenta_drum_de_servitute');
			$t->tinyInteger('existenta_constructie_pe_teren');
			$t->tinyInteger('id_tip_teren');
			$t->tinyInteger('existenta_pud_teren');
			$t->tinyInteger('existenta_puz_teren');
			$t->text('regim_inaltime_teren',60);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartamente', function(Blueprint $t){
		});
	}

}
