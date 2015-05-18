<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('id_localitate')->unsigned()->nullable();
			$table->integer('id_organizatie')->unsigned()->nullable();
			$table->string('parola', 100)->nullable();
			$table->string('nume', 100)->nullable();
			$table->string('prenume', 100)->nullable();
			$table->string('password', 100);
			$table->string('adresa', 200)->nullable();
			$table->string('telefon', 100)->nullable();
			$table->string('email', 100);
			$table->string('email_temp', 100)->nullable();
			$table->tinyInteger('blocked')->nullable();
			$table->timestamp('ultima_logare')->nullable();
			$table->string('avatar', 100)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('reminder_token', 100)->nullable();
		});
*/
		
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('users');
	}

}
