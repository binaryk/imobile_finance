<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntermediarImobilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intermediari_imobile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_tip_intermediar')->unsigned()->nullable();
			$table->integer('id_judet')->unsigned()->nullable();

			$table
			->foreign('id_tip_intermediar')
			->references('id')
			->on('tip_intermediari')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_judet')
			->references('id')
			->on('judete')
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
		Schema::table('intermediari_imobile', function( Blueprint $t ){
			$t
			->dropForeign('intermediari_imobile_id_tip_intermediar_foreign');

			$t
			->dropForeign('intermediari_imobile_id_judet_foreign');
		});
		Schema::drop('intermediari_imobile');
	}

}
