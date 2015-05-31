<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamentFkCladire extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('apartamente', function(Blueprint $t){
			
			$t
			->foreign('id_cladire')
			->references('id')
			->on('cladiri')
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
		Schema::table('apartamente', function (Blueprint $t) {
			$t->dropForeign('apartamente_id_cladire_foreign'); 

        }); 
	}

}
