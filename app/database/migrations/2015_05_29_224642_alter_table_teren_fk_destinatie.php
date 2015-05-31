<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTerenFkDestinatie extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('terenuri', function(Blueprint $t){
			$t
			->foreign('id_tip_destinatie_teren')
			->references('id')
			->on('tip_destinatie_terenuri')
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
		Schema::table('terenuri', function (Blueprint $t) {
			$t->dropForeign('terenuri_id_tip_destinatie_teren_foreign');
        }); 
	}

}
