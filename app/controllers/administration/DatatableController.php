<?php

namespace Imobiliare\Datatable;

class DatatableController extends \Datatable\DatatableController 
{
	protected $layout 		= 'template.layout';

	public function index($id)
	{
		$this->show( \Imobiliare\Grids::make($id)->toIndexConfig($id) );
	}

	public function rows($id)
	{
		dd($id);
		
		return $this->dataset( \Imobiliare\Grids::make($id)->toRowDatasetConfig($id) );
	}

	public function loadForm($id)
	{
		return $this->get_dtform_properties( \Imobiliare\Forms::make($id)->toFormConfig($id), \Input::all() );
	}

	public function doAction()
	{
		return $this->do_action(\Imobiliare\Forms::make($id = \Input::get('code') )->toActionConfig($id), \Input::all() );
	}
}