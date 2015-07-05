<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdaugaColoanaTelefonLaUseri extends Migration 
{

	public function up()
	{
		Schema::table('users', function(Blueprint $t){
			$t->string('telefon', 64)->nullable();
		});
	}

	public function down()
	{
		Schema::table('users', function($t)
		{
		    $t->dropColumn('telefon');
		});
	}

}