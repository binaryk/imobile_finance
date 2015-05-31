<?php

namespace Imobile; 

class Route
{

	protected static $instance = NULL;
	protected $routes = [];

	public function __construct()
	{
		$this
		/* Database general operations */
		->add('get', 'home', '/', 'HomeController@showWelcome', '')
		/**
		IMOBILE
		**/ 
		 
		->add('get', 'imobile-index-row-source', 'aaa/row-source/{id}', 'ImobileController@rows', '\Imobiliare\Datatable')


		->add('get', 'datatable-index', 'nomenclatoare/{id}', 'DatatableController@index', 'Imobiliare\Datatable')
		->add('get', 'datatable-row-source', 'nomenclatoare/row-source/{id}', 'DatatableController@rows', 'Imobiliare\Datatable')
		->add('post', 'datatable-load-form', 'nomenclatoare/load-dt-form/{id}', 'DatatableController@loadForm', 'Imobiliare\Datatable')
		->add('post', 'datatable-do-action', 'nomenclatoare/dt-do-action/{id}', 'DatatableController@doAction', 'Imobiliare\Datatable')


/**
 		Date de baza	
 **/
 		->add('get','judet_localitate_index','nomenclatoare/{id}/{judet_id}','JudetController@index','Imobiliare\Datatable')
		->add('get', 'judet-localitate-row-source', 'nomenclatoare/row-source/{id}/{judet_id}', 'JudetController@rows', 'Imobiliare\Datatable')
 		
		 /**
         Dezvoltatori
          *
          **/
		/**
		END IMOBILE
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