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
        $this->default_order  = "6,'desc'";
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
                'header'    => ['caption' => '#', 'style'   => 'width:4%;text-align:center',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ], 
            '2' => [
                'id'        => 'oferta-valabila',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Oferta valabila', 'style'   => 'width:4%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.oferta_valabila',
            ], 
            '3' => [
                'id'        => 'adresa-exacta',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:20%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.adresa',
            ], 
            '4' => [
                'id'        => 'nr-camere',
                'orderable' => 'yes',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar de camere', 'style'   => 'width:4%',],
                'type'      => 'field-int',
                'source'    => 'nr_camere',
            ],
            '5' => [
                'id'        => 'pret-m2',
                'orderable' => 'yes',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Pret', 'style'   => 'width:4%',],
                'type'      => 'field-float',
                'source'    => 'pret_m2',
            ], 
            '6' => [
                'id'        => 'vechime-imobil',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Vechime', 'style'   => 'width:4%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.vechime',
            ], 
            '7' => [
                'id'        => 'ultima-actualizare',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ultima actualizare', 'style'   => 'width:9%',],
                'type'      => 'field-date',
                'source'    => 'ultima_actualizare',
            ], 
            '8' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefoane', 'style'   => 'width:15%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.telefoane',
            ], 
            '9' => [
                'id'        => 'credit-prima-casa',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Credit prima casa', 'style'   => 'width:4%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.credit_prima_casa',
            ], 
            '10' => [
                'id'        => 'nr-etaje',
                'orderable' => 'yes',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar de etaje', 'style'   => 'width:5%',],
                'type'      => 'field-int',
                'source'    => 'nr_etaj',
            ],
            '11' => [
                'id'        => 'tip-finisaje-interioare',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Finisaj interioar', 'style'   => 'width:7%',],
                'type'      => 'field',
                'source'    => 'finisaj_interior',
            ],
            '12' => [
                'id'        => 'tip-compartiment',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip compartiment', 'style'   => 'width:7%',],
                'type'      => 'field',
                'source'    => 'tip_compartiment',
            ],
            '13' => [
                'id'        => 'tip-imobil',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip imobil', 'style'   => 'width:6%',],
                'type'      => 'field',
                'source'    => 'tip_imobil',
            ],
            '14' => [
                'id'        => 'cmd-vezi-oferta',
                'orderable' => 'no',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Vezi oferta', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'apartamente.cautare.btn-vezi-oferta',
            ],
        ];  
        $this->fields = [
            'fields'      => '',
            'searchables' => 'v_apartamente.adresa_exacta, v_apartamente.telefon, v_apartamente.telefon_secundar_1, v_apartamente.telefon_secundar_2, v_apartamente.finisaj_interior, v_apartamente.tip_compartiment',
            'orderables'  => [
                1 => 'v_apartamente.oferta_valabila',
                2 => 'v_apartamente.adresa_exacta',
                3 => 'v_apartamente.nr_camere',
                4 => 'v_apartamente.pret_m2',
                5 => 'v_apartamente.is_agentie',
                6 => 'v_apartamente.ultima_actualizare',
                7 => 'v_apartamente.telefon',
                8 => 'v_apartamente.credit_prima_casa',
                9 => 'v_apartamente.nr_etaj',
               10 => 'v_apartamente.finisaj_interior',
               11 => 'v_apartamente.tip_compartiment',
            ],
        ];
        $this->filters = [];
    }

    public static function create()
    {
        return self::$instance = new ApartamenteRecord('cauta-apartamente');
    }

}