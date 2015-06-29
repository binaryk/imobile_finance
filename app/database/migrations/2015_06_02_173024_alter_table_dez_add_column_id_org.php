<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDezAddColumnIdOrg extends Migration 
{

	public function up()
	{
		Schema::table('dezvoltatori', function(Blueprint $t){
			$t
			->integer('id_organizatie')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::table('dezvoltatori', function($t)
		{
		    $t->dropColumn('id_organizatie');
		});
	}

}