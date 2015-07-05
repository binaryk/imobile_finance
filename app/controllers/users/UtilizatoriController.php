<?php

namespace Utilizatori;

class UtilizatoriController extends \Datatable\DatatableController
{
	protected $layout 		= 'template.layout';

	public function index()
	{
		$config = \Imobiliare\Grids::make('utilizatori')->toIndexConfig('utilizatori');
		$config['caption'] = '<span class="font-blue">Lista utilizatorilor</span>';
		$this->show( $config + ['other-info' => [
			'current_org' => $this->current_org,
			'current_user' => $this->current_user,
		]]);
	}

	public function rows()
	{
		$config = \Imobiliare\Grids::make('utilizatori')->toRowDatasetConfig('utilizatori');
		// $filters = $config['source']->custom_filters();
		// $config['source']->custom_filters( $filters + [
		// 	'oferta-valabila' => 'v_apartamente.id_organizatie = ' . $this->current_org->id,
		// ]);
		return $this->dataset($config);
	}

}