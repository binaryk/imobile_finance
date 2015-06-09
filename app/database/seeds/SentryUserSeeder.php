<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'password' => 'sentryuser',
	        'prenume' => 'UserFirstName',
	        'nume' => 'UserLastName',
	        'id_organizatie' => 1,
	        'activated' => 1,
	    ));

		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@admin.com',
	        'password' => 'sentryadmin',
	        'prenume' => 'AdminFirstName',
	        'nume' => 'AdminLastName',
	        'id_organizatie' => 2,
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'admin',
	        'password' => '123',
	        'prenume' => 'AdminFirstName',
	        'nume' => 'AdminLastName',
	        'id_organizatie' => 2,
	        'activated' => 1,
	    ));

	    
	}

}