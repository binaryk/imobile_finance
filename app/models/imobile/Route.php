<?php

namespace Imobile;

class Route
{

	protected static $instance = NULL;
	protected $routes = [];

	public function __construct()
	{
		$this
		/**
		IMOBILE
		**/ 
		/* Database general operations */
		->add('get', 'imobile-index', 'imobile', 'ImobileController@index', '') 
		->add('get', 'imobile-add', 'imobile-adauga', 'ImobileController@create', '') 
		->add('post', 'imobile-add', 'imobile-adauga', 'ImobileController@store', '') 
		->add('get', 'imobile-edit', 'imobile-edit', 'ImobileController@edit', '') 

		->add('get', 'cautare-date', 'cauta', 'CautaController@index', '') 
		/**
		GALI. Elementele mele din dashboard 
		**/
 
		;
	}

	protected function add($method, $name, $uri, $action, $namespace)
	{
		$record = new \StdClass();
		$record->method    = $method;
		$record->name      = $name;
		$record->uri       = $uri;
		$record->action    = $action;
		$record->namespace = $namespace;
		$this->routes[] = $record;
		return $this;
	}

	public static function make()
	{
		return self::$instance = new Route();
	}

	public function define()
	{
		foreach($this->routes as $i => $record)
		{
			\Route::{$record->method}(
				$record->uri,
				[
					'as' => $record->name,
					'uses' => ($record->namespace ? $record->namespace . '\\' : ''). $record->action,
				]
			);
		}
	} 
}