<?php

namespace Imobiliare\Imobile\Grid;

class ProprietariRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'proprietari.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Proprietari';
        $this->toolbar        = 'proprietari.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\Proprietari';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js';
        $this->row_source     = 'proprietar-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                * 
                                                FROM proprietari_persoane_fizice
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM proprietari_persoane_fizice :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM proprietari_persoane_fizice';
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
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Nume proprietar', 'style'   => 'width:45%',],
                'type'      => 'field',
                'source'    => 'nume',
            ], 
            '3' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefon', 'style'   => 'width:45%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ], 
            '4' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'proprietari.~actions',
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
        return self::$instance = new ProprietariRecord('proprietari');
    }

}