<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipDestinatieCladire extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tip_destinatie_cladire', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes(); 
			$table->text('nume',50);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tip_destinatie_cladire');
	}

}
