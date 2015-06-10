<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProprietari extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proprietari_persoane_fizice', function(Blueprint $t){
			$t
			->integer('id_organizatie');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('proprietari_persoane_fizice', function(Blueprint $t){
			$t->drop('id_organizatie');
		});

	}

}
