<?php

namespace Imobiliare\Imobile\Grid;

class TerenImobilRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.teren.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Cladiri';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.teren.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\TerenImobil';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js';
        $this->row_source     = 'teren_imobil-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    terenuri.*,
                                                    imobile.nume AS imobil 
                                                FROM terenuri
                                                LEFT JOIN imobile
                                                ON imobile.id = terenuri.id_imobil 
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM terenuri :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM terenuri';
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
                'header'    => ['caption' => 'Imobil', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'imobil',
            ], 
            '3' => [
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Teren nume', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'nume',
            ],
            '4' => [
                'id'        => 'adresa',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'adresa',
            ],
            '5' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefon', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ],
            '6' => [
                'id'        => 'carte_funciara',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Carte funciara', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'carte_funciara',
            ],
            '7' => [
                'id'        => 'destinatie',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Destinație', 'style'   => 'width:15%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.teren.destinatie',
            ],
            '8' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.teren.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, nume',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'terenuri.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new TerenImobilRecord('teren_imobil');
    }

}