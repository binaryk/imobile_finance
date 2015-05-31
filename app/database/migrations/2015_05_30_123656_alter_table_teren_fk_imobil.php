<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTerenFkImobil extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('terenuri', function(Blueprint $t){
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
		Schema::table('terenuri', function (Blueprint $t) {
			$t->dropForeign('terenuri_id_imobil_foreign'); 
        }); 
	}

}
