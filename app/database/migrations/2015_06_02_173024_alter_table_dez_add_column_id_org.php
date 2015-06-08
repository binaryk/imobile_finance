<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDezAddColumnIdOrg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dezvoltatori', function(Blueprint $t){
			$t
			->integer('id_organizatie')->unsigned()->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dezvoltatori', function($t)
		{
		    $t->dropColumn('id_organizatie');
		});
	}

}
