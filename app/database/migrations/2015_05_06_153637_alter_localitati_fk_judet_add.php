<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLocalitatiFkJudetAdd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('localitati', function(Blueprint $t){
			$t
			->foreign('id_judet')
			->references('id')
			->on('judete')
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
		Schema::table('localitati', function (Blueprint $t) {
			$t->dropForeign('localitati_id_judet_foreign');
        }); 
	}

}
