<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasColumn('apartamente', 'nr_camere'))
		{
		    Schema::table('apartamente', function($table)
			{
			    $table->dropColumn('nr_camere');
			});
		}
		Schema::table('apartamente', function($table)
		{
		    	$table->string('nr_camere', 15);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasColumn('apartamente', 'nr_camere'))
		{
		    Schema::table('apartamente', function($table)
			{
			    $table->dropColumn('nr_camere');
			});
		} 
	    Schema::table('apartamente', function($table)
		{
		    	$table->integer('nr_camere');
		});
	}

}