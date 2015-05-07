<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZonaAcoperireDezvoltatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zona_acoperire_dezvoltatori', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_judet')->unsigned()->nullable();
			$table->integer('id_dezvoltator')->unsigned()->nullable();
			$table->string('telefon',50);//in cazul dezvoltatorilor care pot avea Ansabluri in mai multe orasa, ideea lui Claudiu
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('zona_acoperire_dezvoltatori');
	}

}
