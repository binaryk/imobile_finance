<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDezvolatoriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dezvoltatori', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes(); 
			$table->integer('id_judet')->unsigned()->nullable();
			$table->string('nume',50);
			$table->string('prenume',50);
			$table->string('adresa', 200)->nullable();
			$table->string('telefon', 100)->nullable();
			$table->string('email', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dezvoltatori');
	}

}
