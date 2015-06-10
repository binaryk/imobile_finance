<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTerenuri extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('terenuri', function(Blueprint $table)
		{
			$table
				->foreign('id_tip_clasificare_teren')
				->references('id')
				->on('tip_clasificare_teren')
				->onDelete('restrict')
				->onUpdate('cascade');

			$table
				->foreign('id_tip_utilitati')
				->references('id')
				->on('tip_utilitati_teren')
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
		Schema::table('terenuri', function(Blueprint $table)
		{
			$table->dropForeign('terenuri_id_tip_clasificare_teren_foreign'); 
			$table->dropForeign('terenuri_id_tip_utilitati_foreign'); 
		});
	}

}
