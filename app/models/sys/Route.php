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
		->add('get', 'home', '/', 'HomeController@showWelcome', '')

		->add('get', 'profil', 'profil', 'ImobileController@index', '') 
		->add('get', 'imobile-index', 'imobile', 'ImobileController@index', '') 
		->add('get', 'imobile-add', 'imobile-adauga', 'ImobileController@create', '') 
		->add('post', 'imobile-add', 'imobile-adauga', 'ImobileController@store', '') 
		->add('get', 'imobile-edit', 'imobile-edit/{id}', 'ImobileController@edit', '') 
		->add('post', 'imobile-edit', 'imobile-edit/{id}', 'ImobileController@update', '') 
		->add('get', 'imobile-delete', 'imobile-delete/{id}', 'ImobileController@destroy', '') 
		/**
		END IMOBILE
		**/ 

		->add('get', 'cautare-date', 'cautare-date', 'CautaController@index', '') 
		->add('post', 'cautare-date', 'cautare-date', 'CautaController@show', '') 

		/**
		Agentii
		**/
		->add('get', 'agentii-index', 'agentii-index', 'AgentiiController@index', '') 
		/**
		Imobile. verificare presa 
		**/
		->add('get', 'verificare-presa', 'verificare-presa', 'PresaController@index', '') 
 
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