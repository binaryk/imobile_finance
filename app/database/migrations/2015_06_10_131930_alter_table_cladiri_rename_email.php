<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladiriRenameEmail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cladiri', function($table)
		{
		    $table->renameColumn('meail', 'email');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cladiri', function($table)
		{
		    $table->renameColumn('email', 'meail');
		});
	}

}
