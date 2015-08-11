<?php

namespace Apartamente\Grid;

class DezvoltatoriCautaRecord extends \Imobiliare\GridsRecord {

	public function __construct($id) {
		parent::__construct($id);
		$this->view = 'dezvoltatori.cautare.index';
		$this->icon = NULL;
		$this->caption = 'Dezvoltatori Cautare';
		$this->toolbar = 'dezvoltatori.cautare.toolbar';
		$this->name = 'dt';
		$this->display_start = 0;
		$this->display_length = 25;
		$this->default_order = "6,'desc'";
		$this->form = NULL;
		$this->css = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
		$this->js = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js,admin/js/dezvoltatori/cautare.js';
		$this->row_source = 'dezvoltatori-cautare-row-source';
		$this->dom = '<"dt-container"<"row row-dt-processing"<"col-xs-12 dt-processing"r>><"row row-dt-info"<"col-xs-12 dt-info"i>><"row row-dt-toolbar"<"col-xs-6 dt-tb-left"lf<"dt-toolbar">><"col-xs-6 dt-tb-right"p>><"row row-dt"<"col-xs-12 dt-table"t><"col-xs-12 col-md-12 col-lg-12 dt-tb-right"p>>>';
		$this->rows_source_sql = '
            SELECT
                v_dezvoltatori.*
            FROM v_dezvoltatori
            :where: :order:
            ';
		$this->count_filtered_records_sql = '
            SELECT COUNT(*) as cnt FROM v_dezvoltatori :where:
            ';
		$this->count_total_records_sql = '
            SELECT COUNT(*) AS cnt FROM v_dezvoltatori
        ';
		$this->columns = [
			'1' => [
				'id' => '#',
				'orderable' => 'no',
				'class' => 'td-record-count td-align-center',
				'visible' => 'yes',
				'header' => ['caption' => '#', 'style' => 'width:3%; text-align:center'],
				'type' => 'row-number',
				'source' => 'row-number',
			],
			'2' => [
				'id' => 'dezvoltator_ansamblu',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Dezvoltator ansablu', 'style' => 'width:11.25%'],
				'type' => 'view',
				'source' => 'dezvoltatori.cautare.dezvoltator_ansamblu',
			],
			'3' => [
				'id' => 'cladire',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Cladire', 'style' => 'width:11.25%'],
				'type' => 'view',
				'source' => 'dezvoltatori.cautare.cladire',
			],
			'4' => [
				'id' => 'adresa_dezvoltator',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Adresa dezvoltator', 'style' => 'width:11.25%'],
				'type' => 'field',
				'source' => 'adresa_dezvoltator',
			],
			'5' => [
				'id' => 'data_finalizare_cladire',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Data finalizare cladire', 'style' => 'width:11.25%'],
				'type' => 'field-date',
				'source' => 'data_finalizare_cladire',
			],
			'6' => [
				'id' => 'apartament',
				'orderable' => 'yes',
				'class' => 'td-align-center',
				'visible' => 'yes',
				'header' => ['caption' => 'Apartament', 'style' => 'width:11.25%'],
				'type' => 'field',
				'source' => 'apartament',
			],
			'7' => [
				'id' => 'adresa_apartament',
				'orderable' => 'yes',
				'class' => 'td-align-center',
				'visible' => 'yes',
				'header' => ['caption' => 'Adresa apartament', 'style' => 'width:11.25%'],
				'type' => 'field',
				'source' => 'adresa_apartament',
			],
			'8' => [
				'id' => 'compartimentare_apartament',
				'orderable' => 'yes',
				'class' => 'td-align-center',
				'visible' => 'yes',
				'header' => ['caption' => 'Compartimentare apartament', 'style' => 'width:11.25%'],
				'type' => 'field',
				'source' => 'compartimentare_apartament',
			],
			'9' => [
				'id' => 'nr_camere_apartament',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Camere/Finisaje', 'style' => 'width:11.25%'],
				'type' => 'view',
				'source' => 'dezvoltatori.cautare.nr_camere_finisaje_apartament',
			],
			'10' => [
				'id' => 'compartimentare',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Compartimentare', 'style' => 'width:11.25%'],
				'type' => 'field',
				'source' => 'compartimentare_apartament',
			],
			'11' => [
				'id' => 'localizare',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Localizare apartament', 'style' => 'width:11.25%'],
				'type' => 'view',
				'source' => 'dezvoltatori.cautare.localizare',
			],
			'12' => [
				'id' => 'suprafata_utila',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Suprafata utila', 'style' => 'width:9%'],
				'type' => 'field',
				'source' => 'suprafata_utila',
			],
			'14' => [
				'id' => 'data_finalizare_ansamblu',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Data finalizare ansamblu', 'style' => 'width:9%'],
				'type' => 'field-date',
				'source' => 'data_finalizare_ansamblu',
			],
			'15' => [
				'id' => 'telefon_dezvoltator',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Telefon dezvoltator', 'style' => 'width:9%'],
				'type' => 'field',
				'source' => 'telefon_dezvoltator',
			],
			'16' => [
				'id' => 'stadiu_ansamblu',
				'orderable' => 'yes',
				'class' => 'td-align-left',
				'visible' => 'yes',
				'header' => ['caption' => 'Stadiu ansamblu', 'style' => 'width:9%'],
				'type' => 'field',
				'source' => 'stadiu_ansamblu',
			],
			'17' => [
				'id' => 'cmd-vezi-oferta',
				'orderable' => 'yes',
				'class' => 'td-align-center',
				'visible' => 'yes',
				'header' => ['caption' => 'Acțiuni', 'style' => 'width:7%'],
				'type' => 'view',
				'source' => 'dezvoltatori.cautare.btn-vezi-oferta',
			],
		];
		$this->fields = [
			'fields' => '',
			'searchables' => 'v_dezvoltatori.telefon_dezvoltator',
			'orderables' => [
				1 => 'v_dezvoltatori.id'],
		];
		$this->filters = [];
	}

	public static function create() {
		return self::$instance = new DezvoltatoriCautaRecord('cauta_dezvoltatori');
	}

}