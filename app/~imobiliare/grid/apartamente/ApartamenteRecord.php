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
        $this->display_length = 5;
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
                'header'    => ['caption' => '#', 'style'   => 'width:5%',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ], 
            '2' => [
                'id'        => 'oferta-valabila',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Oferta valabila', 'style'   => 'width:95%',],
                'type'      => 'field',
                'source'    => 'oferta_valabila',
            ], 
        ];  
        $this->fields = [
            'fields'      => 'v_apartamente.id,v_apartamente.oferta_valabila',
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