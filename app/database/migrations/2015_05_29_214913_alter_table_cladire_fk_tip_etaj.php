<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladireFkTipEtaj extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('cladiri', function(Blueprint $t){
			$t
			->foreign('id_tip_regim_inaltime')
			->references('id')
			->on('tip_etaje')
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
			$t->dropForeign('cladiri_id_tip_regim_inaltime_foreign');
        }); 
	}

}
