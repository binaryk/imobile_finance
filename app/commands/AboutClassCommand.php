<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AboutClassCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'about-class';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Informatii despre o clasa trimisa ca parametru.';

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
		$class_name = $this->ask('Numele clasei: ');
		if( !class_exists($class_name) )
			$this->info('Clasa nu exista');
		else{
			$object = new $class_name();
			dd($object);
		}


		
		

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}
 

}
