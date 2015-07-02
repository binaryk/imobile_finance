<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamenteDeleteFkCartiere extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function( Blueprint $t ){ 
			$t
			->dropForeign('apartamente_id_cartier_foreign'); 		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('apartamente', function(Blueprint $table)
		{
			$table
			->foreign('id_cartier')
			->references('id')
			->on('cartiere')
			->onDelete('restrict')
			->onUpdate('cascade'); 
		});
	}

}
