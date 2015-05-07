<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UserCreatorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user-create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creeaza rapid un utilizator.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		 $username = $this->ask('Introduceti numele utilizatorului: ');
		 $password = $this->ask('Introduceti parola utilizatorului: ');

		 $user = new User;
		 $user->nume = $username;
		 $user->password = Hash::make($password);
		 $user->save();
		 $this->info('Utilizatorul a fost creat');

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('username', InputArgument::REQUIRED, 'Desired usename.'),
			// array('password', InputArgument::REQUIRED, 'Desired password.'),
		);
	} 

}
