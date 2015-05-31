<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerenuri extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terenuri', function(Blueprint $table)
		{
				$table->increments('id');
				$table->timestamps();
				$table->softdeletes();
				$table->integer('id_tip_destinatie_teren')->unsigned()->nullable();
				$table->integer('id_tip_categorie_teren')->unsigned()->nullable();
				$table->integer('id_imobil')->unsigned()->nullable();
				$table->string('nume',50); 
				$table->string('adresa', 200)->nullable();
				$table->string('teren', 200)->nullable();
				$table->string('telefon', 100)->nullable(); 
				$table->text('carte_funciara', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terenuri');
	}

}
