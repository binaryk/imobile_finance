<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamenteAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
		{
			Schema::table('apartamente', function(Blueprint $t){
				$t->   text('strada')->after('zona_aproximativa');
				$t->integer('nr_cladire')->after('strada');
				$t->integer('scara')->after('nr_cladire');
				$t->integer('nr_apartament')->after('scara');
				$t->double( 'suprafata_teren')->after('nr_apartament');

			});
		}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartamente', function(Blueprint $t){
				// $t->dropColumn(['strada','nr_cladire','scara','nr_apartament']);

		});
	}

}
