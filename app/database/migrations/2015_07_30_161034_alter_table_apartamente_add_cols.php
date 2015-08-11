<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterTableApartamenteAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('apartamente', function (Blueprint $t) {
			$t->text('orientare_geografica', 50);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('apartamente', function (Blueprint $t) {
			$t->dropcolumn('orientare_geografica');
		});
	}

}
