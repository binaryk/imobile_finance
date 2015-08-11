<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladiri extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cladiri', function(Blueprint $t){
			$t->text('regim_inaltime');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cladiri', function(Blueprint $t){
			$t->dropColumn('regim_inaltime');
		});
	}

}
