<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterUploadedPhotosAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('uploaded_photos', function (Blueprint $t) {
			$t->bigInteger('id_cladire')->after('id_ansamblu');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('uploaded_photos', function (Blueprint $t) {
			$t->dropcolumn('id_cladire');
		});
	}
}
