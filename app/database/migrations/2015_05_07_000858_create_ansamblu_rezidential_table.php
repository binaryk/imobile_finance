<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnsambluRezidentialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ansambluri_rezidentiale', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_dezvoltator')->unsigned()->nullable();
			$table->integer('id_organizatie')->unsigned()->nullable();
			$table->integer('id_cartier')->unsigned()->nullable();
			$table->integer('id_tip_stadiu_ansamblu')->unsigned()->nullable();
			$table->string('telefon',15);
			$table->string('nume',50);
			$table->integer('anul_infiintarii');
			$table->date('data_estimativa_vanzare');
			$table->string('strada',50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ansambluri_rezidentiale');
	}

}
