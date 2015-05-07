<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizatiiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizatii', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->integer('deleted_by')->unsigned()->nullable();
			$table->integer('id_localitate')->unsigned()->nullable();
			$table->tinyInteger('is_deleted')->default(0);
			$table->string('denumire',50);
			$table->string('telefon',15);
			$table->string('fax',15);
			$table->string('adresa',255);
			$table->string('email',25);
			$table->integer('anul_infiintarii');

		});  

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{ 
		Schema::drop('organizatii');
	}

}
