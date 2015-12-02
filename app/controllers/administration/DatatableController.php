<?php

namespace Imobiliare\Datatable;

class DatatableController extends \Datatable\DatatableController
{
	protected $layout 		= 'template.layout';

    /**
     * @param $id
     * @throws \Exception
     */
    public function index($id)
	{
        $this->show( \Imobiliare\Grids::make($id)->toIndexConfig($id) );
	}

    public function test($cevq){

    }
    /**
     * @param $id
     * @return mixed
     */
    public function rows($id)
	{
		return $this->dataset( \Imobiliare\Grids::make($id)->toRowDatasetConfig($id) );
	}

    /**
     * @param $id
     * @return mixed
     */
    public function loadForm($id)
	{
		return $this->get_dtform_properties( \Imobiliare\Forms::make($id)->toFormConfig($id), \Input::all() );
	}

    /**
     * @return mixed
     */
    public function doAction()
	{
        // dd($this->do_action(\Imobiliare\Forms::make($id = \Input::get('code') )->toActionConfig($id), \Input::all() ) );
		return $this->do_action(\Imobiliare\Forms::make($id = \Input::get('code') )->toActionConfig($id), \Input::all() );
	}
}
