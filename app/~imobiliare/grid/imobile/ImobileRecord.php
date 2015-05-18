<?php

namespace Imobiliare\Imobile\Grid;

class ImobileRecord extends \Imobiliare\GridsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);

		$this->view           = 'imobiles.index';
		$this->icon           = 'fa-cogs';
		$this->caption        = 'Imobile lista';
		$this->toolbar        = 'imobiles.toolbar';
		$this->name           = 'dt';
		$this->display_start  = 0;
		$this->display_length = 10;
		$this->default_order  = "1,'asc'";
		$this->form           = 'Imobiliare\Imobile\Form\Imobil';
		$this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
		$this->js             = 'admin/js/libraries/form/dtform.js';
		$this->row_source     = 'imobile-index-row-source';
		$this->rows_source_sql 				= 'SELECT * FROM imobile :where: :order:';
		$this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM imobile :where:';
		$this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM imobile';
		$this->columns        = [
			'1' => [
				'id'        => '#',
				'orderable' => 'no',
				'class'     => 'td-record-count td-align-right',
				'visible'   => 'yes',
				'header'    => ['caption' => '#', 'style'   => 'width:5%',],
				'type'      => 'row-number',
				'source'    => 'row-number',
			],
			'2' => [
				'id'        => 'denumire',
				'orderable' => 'yes',
				'class'     => 'td-align-left',
				'visible'   => 'yes',
				'header'    => ['caption' => 'Denumire imobil', 'style'   => 'width:50%',],
				'type'      => 'field',
				'source'    => 'denumire',
			],
			'3' => [
				'id'        => 'suprafata_min',
				'orderable' => 'yes',
				'class'     => 'td-align-left',
				'visible'   => 'yes',
				'header'    => ['caption' => 'Suprafata minima', 'style'   => 'width:15%',],
				'type'      => 'field',
				'source'    => 'suprafata_min',
			],
			'4' => [
				'id'        => 'suprafata_max',
				'orderable' => 'yes',
				'class'     => 'td-align-left',
				'visible'   => 'yes',
				'header'    => ['caption' => 'Suprafata maxima', 'style'   => 'width:15%',],
				'type'      => 'field',
				'source'    => 'suprafata_max',
			],
			'5' => [
				'id'        => 'action',
				'orderable' => 'no',
				'class'     => 'td-align-center td-actions',
				'visible'   => 'yes',
				'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:5%',],
				'type'      => 'view',
				'source'    => 'imobiles.~actions',
			],
		];
		$this->fields = [
			'fields'      => '',
			'searchables' => 'id, denumire',
			'orderables'  => [1 => 'denumire'],
		];
		$this->filters = [
			'deleted' => 'deleted_at is null',
		];

	}

    public static function create()
	{
		return self::$instance = new ImobileRecord('imobile');
	}
	
}