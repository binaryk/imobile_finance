<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterZonaAcoperireDezvoltatoriFkJudetDezv extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zona_acoperire_dezvoltatori', function( Blueprint $t ){
			$t
			->foreign('id_judet')
			->references('id')
			->on('judete')
			->onDelete('restrict')
			->onUpdate('cascade');

			$t
			->foreign('id_dezvoltator')
			->references('id')
			->on('dezvoltatori')
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
		Schema::table('zona_acoperire_dezvoltatori', function(Blueprint $t){
			$t
			->dropForeign('zona_acoperire_dezvoltatori_id_judet_foreign');
			$t
			->dropForeign('zona_acoperire_dezvoltatori_id_dezvoltator_foreign');

		});
	}

}
