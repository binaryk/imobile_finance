<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCladire extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cladiri', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes(); 
			$table->integer('id_imobil')->unsigned()->nullable();
			$table->integer('id_localitate')->unsigned()->nullable();
			$table->integer('id_tip_destinatie')->unsigned()->nullable();
			$table->integer('id_tip_regim_inaltime')->unsigned()->nullable();
			$table->integer('id_tip_stadiu')->unsigned()->nullable();
			$table->integer('nr_spatii_indivize');
			$table->string('nume',50);
			$table->tinyInteger('ascensor');
			$table->string('adresa', 200)->nullable();
			$table->string('telefon', 100)->nullable();
			$table->string('meail', 100);
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
		Schema::drop('cladiri');
	}

}
