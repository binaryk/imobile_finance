<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamenteModifyCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function(Blueprint $table){
            $table->dropColumn('nr_etaj');
        });
        Schema::table('apartamente', function(Blueprint $table){
            $table->bigInteger('nr_etaj');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
