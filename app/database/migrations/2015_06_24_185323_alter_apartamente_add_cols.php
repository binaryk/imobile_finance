<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApartamenteAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
		{
			Schema::table('apartamente', function(Blueprint $t){
				$t->tinyinteger('vechime_imobil');
				$t->integer('tip_imobil')->unsigned()->nullable();

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
				$t->drop('vechime_imobil');
				$t->drop('tip_imobil');

		});
	}

}
