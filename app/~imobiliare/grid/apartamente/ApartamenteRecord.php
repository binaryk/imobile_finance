<?php

namespace Apartamente\Grid;

class ApartamenteRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'apartamente.cautare.index'; 
        $this->icon           =  NULL;
        $this->caption        = 'Apartamente';
        $this->toolbar        = 'apartamente.cautare.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 25;
        $this->default_order  = "0,'asc'";
        $this->form           = NULL;
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js, admin/js/apartamente/cautare.js';
        $this->row_source     = 'apartamente-cautare-row-source';
        $this->rows_source_sql = '
            SELECT
                v_apartamente.*
            FROM v_apartamente
            :where: :order:
            ';
        $this->count_filtered_records_sql 	= '
            SELECT COUNT(*) as cnt FROM v_apartamente :where:
            ';
        $this->count_total_records_sql     	= '
            SELECT COUNT(*) AS cnt FROM apartamente
        ';
        $this->columns        = [
            '1' => [
                'id'        => '#',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => '#', 'style'   => 'width:5%;text-align:center',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ], 
            '2' => [
                'id'        => 'oferta-valabila',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Oferta valabila', 'style'   => 'width:5%',],
                'type'      => 'field',
                'source'    => 'oferta_valabila',
            ], 
            '3' => [
                'id'        => 'adresa-exacta',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'adresa_exacta',
            ], 
            '4' => [
                'id'        => 'nr-camere',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar de camere', 'style'   => 'width:5%',],
                'type'      => 'field-int',
                'source'    => 'nr_camere',
            ],
            '5' => [
                'id'        => 'pret-m2',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Pret', 'style'   => 'width:5%',],
                'type'      => 'field-float',
                'source'    => 'pret_m2',
            ], 
            '6' => [
                'id'        => 'is-agentie',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Agentie', 'style'   => 'width:5%',],
                'type'      => 'field',
                'source'    => 'is_agentie',
            ], 
            '7' => [
                'id'        => 'ultima-actualizare',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ultima actualizare', 'style'   => 'width:10%',],
                'type'      => 'field-date',
                'source'    => 'ultima_actualizare',
            ], 
            '8' => [
                'id'        => 'telefon',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefoane', 'style'   => 'width:15%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.telefoane',
            ], 
            '9' => [
                'id'        => 'credit-prima-casa',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Credit prima casa', 'style'   => 'width:5%',],
                'type'      => 'field',
                'source'    => 'credit_prima_casa',
            ], 
            '10' => [
                'id'        => 'nr-etaje',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar de etaje', 'style'   => 'width:5%',],
                'type'      => 'field-int',
                'source'    => 'nr_etaj',
            ],
            '11' => [
                'id'        => 'tip-finisaje-interioare',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Finisaj interioar', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'finisaj_interior',
            ],
            '12' => [
                'id'        => 'tip-compartiment',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip compartiment', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'tip_compartiment',
            ],
        ];  
        $this->fields = [
            'fields'      => 'v_apartamente.id,v_apartamente.oferta_valabila,v_apartamente.adresa_exacta,v_apartamente.is_agentie,v_apartamente.nr_camere',
            'searchables' => 'v_apartamente.oferta_valabila',
            'orderables'  => [],
        ];
        $this->filters = [];
    }

    public static function create()
    {
        return self::$instance = new ApartamenteRecord('cauta-apartamente');
    }

}