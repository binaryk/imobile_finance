<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDezvoltatoriFkJudet extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dezvoltatori',function( Blueprint $t ){

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
		Schema::table('dezvoltatori', function( Blueprint $t){
			$t
			->dropForeign('dezvoltatori_id_judet_foreign');
		});
		
	}

}
