<?php

namespace Imobiliare\Imobile\Grid;

class TipCategorieImobilRecord extends \Imobiliare\GridsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);

		$this->view           = '~layouts.datatable.index';
		$this->icon           = 'admin/img/icons/dt/settings.png';
		$this->caption        = 'Tip categorie imobil';
		$this->toolbar        = 'nomenclator.tip_categorie_imobil.toolbar';
		$this->name           = 'dt';
		$this->display_start  = 0;
		$this->display_length = 10;
		$this->default_order  = "1,'asc'";
		$this->form           = 'Imobiliare\Imobile\Form\TipCategorieImobil';
		$this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
		$this->js             = 'admin/js/libraries/form/dtform.js';
		$this->row_source     = 'datatable-row-source';
		$this->rows_source_sql 				= 'SELECT * FROM tip_categorie_imobil :where: :order:';
		$this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM tip_categorie_imobil :where:';
		$this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM tip_categorie_imobil';
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
				'header'    => ['caption' => 'Denumire categorie imobil', 'style'   => 'width:50%',],
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
				'source'    => 'imobiles.~actions',
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
		return self::$instance = new TipCategorieImobilRecord('tip_categorie_imobil');
	}
	
}