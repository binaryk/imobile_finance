<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCladiriRemoveFkDestinatieStadiu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cladiri', function (Blueprint $t) {
			$t->dropForeign('cladiri_id_tip_destinatie_foreign');
			$t->dropForeign('cladiri_id_tip_stadiu_foreign');
			$t->dropForeign('cladiri_id_tip_categorie_foreign');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 

		Schema::table('cladiri', function(Blueprint $t){
			$t
			->foreign('id_tip_destinatie')
			->references('id')
			->on('tip_destinatie_cladire')
			->onDelete('restrict')
			->onUpdate('cascade');

			$t
			->foreign('id_tip_stadiu')
			->references('id')
			->on('tip_stadii_ansamblu')
			->onDelete('restrict')
			->onUpdate('cascade');

			$t
			->foreign('id_tip_categorie')
			->references('id')
			->on('tip_categorii_cladire')
			->onDelete('restrict')
			->onUpdate('cascade');
		});
	}

}
