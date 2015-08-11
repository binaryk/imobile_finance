<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAnsambluri extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ansambluri_rezidentiale', function(Blueprint $t){
			$t->text('detalii_localizare_descriere');
			$t->date('data_finalizare');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ansambluri_rezidentiale', function(Blueprint $t){
			$t->dropColumn(['detalii_localizare_descriere', 'data_finalizare']);
		});
	}

}
