<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgentii extends Migration
{

	public function up()
	{
		Schema::create('agentii', function(Blueprint $t)
		{
			$t->increments('id');
			
			$t->string('nume', 64);
			$t->string('telefon', 64);

			$t->timestamps();
			$t->softdeletes();
			

		});
	}

	public function down()
	{
		Schema::drop('agentii');
	}

}