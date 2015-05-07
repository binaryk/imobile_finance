<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefoanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telefoane', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_intermediar')->unsigned()->nullable();
			$table->integer('id_dezvoltator')->unsigned()->nullable();
			$table->string('telefon',50);

			$table
			->foreign('id_intermediar')
			->references('id')
			->on('intermediari_imobile')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_dezvoltator')
			->references('id')
			->on('dezvoltatori')
			->onDelete('restrict')
			->onUpdate('cascade');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('telefoane', function( Blueprint $t ){
			$t
			->dropForeign('telefoane_id_intermediar_foreign');

			$t
			->dropForeign('telefoane_id_dezvoltator_foreign');
		});
		Schema::drop('telefoane');
	}

}
