<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersFkOrg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function(Blueprint $t){
			$t
			->foreign('id_organizatie')
			->references('id')
			->on('organizatii')
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
		Schema::table('users', function (Blueprint $t) {
			$t->dropForeign('users_id_organizatie_foreign');
        }); 
	}

}
