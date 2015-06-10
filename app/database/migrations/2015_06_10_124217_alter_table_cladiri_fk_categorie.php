<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladiriFkCategorie extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cladiri', function( Blueprint $t ){
			$t
			->foreign('id_tip_categorie')
			->references('id')
			->on('tip_categorii_cladire')
			->onDelete('restrict')
			->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cladiri', function (Blueprint $t) {
			$t->dropForeign('cladiri_id_tip_categorie_foreign'); 
        }); 
	}

}
