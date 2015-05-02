<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCamere extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */ 
	public function up()
	{
		Schema::create('tip_nr_camere',function(Blueprint $table){
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('nr_camere',50);
		}); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tip_nr_camere');
	}

}
