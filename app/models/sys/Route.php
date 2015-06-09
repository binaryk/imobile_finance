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
          **/
         ->add('get','dezvoltatori-index','dezvoltatori', 'DezvoltatoriController@index', 'Imobiliare\Datatable')
         ->add('get','dezvoltatori-row-source','dezvoltatori/{id}', 'DezvoltatoriController@rows', 'Imobiliare\Datatable')

         ->add('get','dezvoltatori_ansambluri','dezvoltatori/{id}/{id_dezvoltator}', 'DezvoltatoriAnsambluriController@index', 'Imobiliare\Datatable')
         ->add('get','dezvoltatori-ansambluri-row-source','dezvoltatori/row-source/{id}/{id_dezvoltator}', 'DezvoltatoriAnsambluriController@rows', 'Imobiliare\Datatable') 

         ->add('get','ansamblu_imobil','dezvoltatori/ansambluri-imobile/{id}/{id_ansamblu}', 'AnsambluriImobileController@index', 'Imobiliare\Datatable')
         ->add('get','ansamblu-imobil-row-source','ansambluri-imobile/row-source/{id}/{id_ansamblu}', 'AnsambluriImobileController@rows', 'Imobiliare\Datatable')

         ->add('get','categorie_imobil','dezvoltatori/categorie_imobil/{id}/{id_imobil}', 'ImobilCategorieController@index', 'Imobiliare\Datatable')
         ->add('get','categorie-imobil-row-source','dezvoltatori/categorie-imobil/row-source/{id}/{id_imobil}', 'ImobilCategorieController@rows', 'Imobiliare\Datatable')

         ->add('get','cladire_imobil','dezvoltatori/cladire_imobil/{id}/{id_imobil}', 'CladireImobilController@index', 'Imobiliare\Datatable')
         ->add('get','cladire_imobil-row-source','cladire_imobil/row-source/{id}/{id_imobil}', 'CladireImobilController@rows', 'Imobiliare\Datatable') 

         ->add('get','apartament_imobil','dezvoltatori/apartament_imobil/{id}/{id_imobil}', 'ApartamentImobilController@index', 'Imobiliare\Datatable')
         ->add('get','apartament_imobil-row-source','apartament_imobil/row-source/{id}/{id_imobil}', 'ApartamentImobilController@rows', 'Imobiliare\Datatable') 
         
         ->add('get','teren_imobil','dezvoltatori/teren_imobil/{id}/{id_imobil}', 'TerenImobilController@index', 'Imobiliare\Datatable')
         ->add('get','teren_imobil-row-source','teren_imobil/row-source/{id}/{id_imobil}', 'TerenImobilController@rows', 'Imobiliare\Datatable') 
         
		/**
		END IMOBILE
		**/ 

		->add('get', 'cautare-apartamente-index', 'cautare-apartamente', 'CautareApartamenteController@index', 'Apartamente') 
		->add('get', 'apartamente-cautare-row-source', 'cautare-apartamente-row-source', 'CautareApartamenteController@rows', 'Apartamente')
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