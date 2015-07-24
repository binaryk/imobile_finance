<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAnsambluriAddCold extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ansambluri_rezidentiale', function(Blueprint $t){
			$t->text('detalii_localizare');
			$t->text('detalii_confort');
			$t->text('detalii_sistem_constructiv');
			$t->text('detalii_financiare');
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
			$t->dropColumn(['detalii_localizare',
							'detalii_confort',
							'detalii_sistem_constructiv',
							'data_finalizare',
							'detalii_financiare']);
		});
	}

}
