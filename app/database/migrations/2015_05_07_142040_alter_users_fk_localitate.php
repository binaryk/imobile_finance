<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersFkLocalitate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function(Blueprint $t){ 
			$t
			->foreign('id_localitate')
			->references('id')
			->on('localitati')
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
			$t->dropForeign('users_id_localitate_foreign');
        }); 
	}

}
