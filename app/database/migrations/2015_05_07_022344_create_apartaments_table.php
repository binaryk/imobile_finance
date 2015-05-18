<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartamente', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_imobil')->unsigned()->nullable();
			$table->integer('id_cartier')->unsigned()->nullable();
			$table->integer('id_organizatie')->unsigned()->nullable();
			$table->integer('id_proprietar_pf')->unsigned()->nullable();
			$table->double('suprafata_min');
			$table->double('suprafata_max');

			$table
			->foreign('id_imobil')
			->references('id')
			->on('imobile')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_cartier')
			->references('id')
			->on('cartiere')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_organizatie')
			->references('id')
			->on('organizatii')
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
		Schema::table('apartamente', function( Blueprint $t ){
			$t
			->dropForeign('apartamente_id_imobil_foreign');	
			$t
			->dropForeign('apartamente_id_cartier_foreign');
			$t
			->dropForeign('apartamente_id_organizatie_foreign');		
		});
		Schema::drop('apartamente');
	}

}
