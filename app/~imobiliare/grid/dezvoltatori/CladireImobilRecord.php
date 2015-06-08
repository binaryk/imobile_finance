<?php

namespace Imobiliare\Imobile\Grid;

class CladireImobilRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.cladire.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Cladiri';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.cladire.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\CladireImobil';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js';
        $this->row_source     = 'cladire_imobil-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    cladiri.*,
                                                    imobile.nume AS imobil 
                                                FROM cladiri
                                                LEFT JOIN imobile
                                                ON imobile.id = cladiri.id_imobil 
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM cladiri :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM cladiri';
        $this->columns        = [
            '1' => [
                'id'        => '#',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => '#', 'style'   => 'width:3%',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ], 
            '2' => [
                'id'        => 'imobil',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Imobil', 'style'   => 'width:45%',],
                'type'      => 'field',
                'source'    => 'imobil',
            ], 
            '3' => [
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Clădire nume', 'style'   => 'width:45%',],
                'type'      => 'field',
                'source'    => 'nume',
            ],
            '4' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.cladire.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, nume',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'cladiri.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new CladireImobilRecord('cladire_imobil');
    }

}