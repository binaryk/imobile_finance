<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipNrBalcoane extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tip_nr_balcoane', function(Blueprint $table){
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nume',50);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tip_nr_balcoane');
	}


}
