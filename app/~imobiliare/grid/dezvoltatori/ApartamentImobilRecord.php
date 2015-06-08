<?php

namespace Imobiliare\Imobile\Grid;

class ApartamentImobilRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.apartament.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Apartamente';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.apartament.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\ApartamentImobil';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css, assets/global/plugins/icheck/skins/all.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js, assets/global/plugins/icheck/icheck.min.js, assets/admin/pages/scripts/form-icheck.js';
        $this->row_source     = 'apartament_imobil-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    apartamente.*,
                                                    imobile.nume AS imobil,
                                                    cartiere.nume AS cartier,
                                                    tip_finisaje_interioare.nume AS finisaje_interioare
                                                FROM apartamente
                                                LEFT JOIN imobile
                                                ON imobile.id = apartamente.id_imobil 
                                                LEFT JOIN cartiere
                                                ON cartiere.id = apartamente.id_cartier 
                                                LEFT JOIN tip_finisaje_interioare
                                                ON tip_finisaje_interioare.id = apartamente.id_tip_finisaje_interioare
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM apartamente :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM apartamente';
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
                'header'    => ['caption' => 'Imobil', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'imobil',
            ], 
            '3' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Apartament telefon', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ], 
            '4' => [
                'id'        => 'ultima_actualizare',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ultima actualizare', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'ultima_actualizare',
            ],
            '5' => [
                'id'        => 'cartier',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Cartier apartament', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'cartier',
            ],
            '6' => [
                'id'        => 'finisaje_interioare',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Finisaje interioare', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'finisaje_interioare',
            ],
            '7' => [
                'id'        => 'suprafata_min',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata minima', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'suprafata_min',
            ],
            '8' => [
                'id'        => 'suprafata_max',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata maxima', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'suprafata_max',
            ],
            '9' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.apartament.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, adresa_exacta',
            'orderables'  => [1 => 'adresa_exacta'],
        ];
        $this->filters = [
            'deleted' => 'apartamente.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new ApartamentImobilRecord('apartament_imobil');
    }

}