<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladiriFkImobile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('cladiri', function(Blueprint $t){
			$t
			->foreign('id_imobil')
			->references('id')
			->on('imobile')
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
			$t->dropForeign('cladiri_id_imobil_foreign'); 
        }); 
	}

}
