<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImobilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imobile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_ansamblu')->unsigned()->nullable();
			$table->integer('id_tip_categorie')->unsigned()->nullable();
			$table->integer('id_tip_imobil')->unsigned()->nullable();
			$table->double('suprafata_min');
			$table->double('suprafata_max');

			$table
			->foreign('id_tip_categorie')
			->references('id')
			->on('tip_categorie_imobil')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_tip_imobil')
			->references('id')
			->on('tip_imobile')
			->onDelete('restrict')
			->onUpdate('cascade');
			
			$table
			->foreign('id_ansamblu')
			->references('id')
			->on('ansambluri_rezidentiale')
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
		Schema::table('imobile', function( Blueprint $t ){
			$t
			->dropForeign('imobile_id_tip_categorie_foreign');

			$t
			->dropForeign('imobile_id_tip_imobil_foreign');

			$t
			->dropForeign('imobile_id_ansamblu_foreign');
		});

		Schema::drop('imobile');
	}

}
