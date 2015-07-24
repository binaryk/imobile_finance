<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCladiriAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('cladiri', function (Blueprint $t) {
			$t->date('data_finalizare');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('cladiri', function (Blueprint $t) {
			$t->dropcolumn('data_finalizare');
		});
	}

}
