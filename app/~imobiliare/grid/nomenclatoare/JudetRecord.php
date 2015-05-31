<?php

namespace Imobiliare\Imobile\Grid;

class JudetRecord extends \Imobiliare\GridsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);

		$this->view           = '~layouts.datatable.index'; 
		$this->icon           = 'admin/img/icons/dt/settings.png';
		$this->caption        = 'Județe';
		$this->toolbar        = 'nomenclator.judet.toolbar';
		$this->name           = 'dt';
		$this->display_start  = 0;
		$this->display_length = 10;
		$this->default_order  = "1,'asc'";
		$this->form           = 'Imobiliare\Imobile\Form\Judet';
		$this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
		$this->js             = 'admin/js/libraries/form/dtform.js';
		$this->row_source     = 'datatable-row-source';
		$this->rows_source_sql 				= 'SELECT * FROM judete :where: :order:';
		$this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM judete :where:';
		$this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM judete';
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
				'header'    => ['caption' => 'Judet imobil', 'style'   => 'width:50%',],
				'type'      => 'field',
				'source'    => 'nume',
			],
			'3' => [
				'id'        => 'action',
				'orderable' => 'no',
				'class'     => 'td-align-center td-actions',
				'visible'   => 'yes',
				'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:5%',],
				'type'      => 'view',
				'source'    => 'nomenclator.judet.~actions',
			],
		];
		$this->fields = [
			'fields'      => '',
			'searchables' => 'id, nume',
			'orderables'  => [1 => 'nume'],
		];
		$this->filters = [
			'deleted' => 'deleted_at is null',
		];

	}

    public static function create()
	{
		return self::$instance = new JudetRecord('judet');
	}
	
}