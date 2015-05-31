<?php

namespace Imobiliare\Datatable;

class JudetController extends \Datatable\DatatableController 
{
	protected $layout 		= 'template.layout';

	public function index($id, $id_judet)
	{
		 

		// daca nu am un judet revin la pagina cu programe operationale
		if( ! ($judet = \Imobiliare\Nomenclator\Judet::getRecord( (int) $id_judet)) )
		{
			return \Redirect::route('datatable-index', ['id' => 'judet']);
		}

		$config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
		

		// setez noul caption ca sa tina cont de judet
		$config['caption'] .= ' pentru <span class="text-purple">' . $judet->denumire . '</span>';
		// setez noul row-source ca sa tine cont de judet
		$config['row-source'] .= '/' . $id_judet;


		$this->show( $config + ['other-info' => ['judet' => $judet]]);
	}

	public function rows($id, $id_judet)
	{
 	
		$config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);

		// adaug la custom_filters si judetul
		$filters = $config['source']->custom_filters();
		$config['source']->custom_filters( $filters + ['judetul' => 'id_judet = ' . $id_judet] );
		return $this->dataset( $config );
	}

	public function loadForm($id)
	{
		return $this->get_dtform_properties( \Input::all() );
	}

	public function doAction()
	{
		return $this->do_action( \Input::all() );
	}
} 