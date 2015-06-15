<?php

namespace Imobiliare\Imobile\Grid;

class ApartamenteProprietarRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'proprietari.apartamente.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Apartamente';
        $this->toolbar        = 'proprietari.apartamente.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\ApartamentProprietar';
        $this->css            = 'admin/css/dt/dt.css, 
                                admin/css/dt/toolbar.css, 
                                admin/css/dt/dtform.css, 
                                assets/global/plugins/icheck/skins/all.css,
                                assets/global/plugins/bootstrap-datepicker/css/datepicker3.css
                                 ';
        $this->js             = 'admin/js/libraries/form/dtform.js,  
                                 assets/global/plugins/icheck/icheck.min.js, 
                                 assets/admin/pages/scripts/form-icheck.js,
                                 assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js 
                                 ';
        $this->row_source     = 'apartamente_proprietar-row-source';
        $this->rows_source_sql              = 'SELECT
                                                    apartamente.*,
                                                    cartiere.nume AS cartier,
                                                    tip_finisaje_interioare.nume AS finisaje_interioare,
                                                    uploaded_photos.file_name AS photo
                                                FROM apartamente
                                                LEFT JOIN cartiere
                                                ON cartiere.id = apartamente.id_cartier 
                                                LEFT JOIN tip_finisaje_interioare
                                                ON tip_finisaje_interioare.id = apartamente.id_tip_finisaje_interioare 
                                                LEFT JOIN uploaded_photos
                                                ON uploaded_photos.id_apartament = apartamente.id
                                                :where: GROUP BY uploaded_photos.id_apartament :order:';
        $this->count_filtered_records_sql   = 'SELECT COUNT(*) as cnt FROM apartamente :where:';
        $this->count_total_records_sql      = 'SELECT COUNT(*) AS cnt FROM apartamente';
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
                'id'        => 'photo',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Poza', 'style'   => 'width:12.85%',],
                'type'      => 'view',
                'source'    => 'proprietari.apartamente.photo',
            ],   
            '3' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Apartament telefon', 'style'   => 'width:12.85%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ], 
            '4' => [
                'id'        => 'ultima_actualizare',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ultima actualizare', 'style'   => 'width:12.85%',],
                'type'      => 'field-date',
                'source'    => 'ultima_actualizare',
            ],
            '5' => [
                'id'        => 'cartier',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Cartier apartament', 'style'   => 'width:12.85%',],
                'type'      => 'field',
                'source'    => 'cartier',
            ],
            '6' => [
                'id'        => 'finisaje_interioare',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Finisaje interioare', 'style'   => 'width:12.85%',],
                'type'      => 'field',
                'source'    => 'finisaje_interioare',
            ],
            '7' => [
                'id'        => 'suprafata_min',
                'orderable' => 'no',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata minima', 'style'   => 'width:12.85%',],
                'type'      => 'field-float',
                'source'    => 'suprafata_min',
            ],
            '8' => [
                'id'        => 'suprafata_max',
                'orderable' => 'no',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata maxima', 'style'   => 'width:12.85%',],
                'type'      => 'field-float',
                'source'    => 'suprafata_max',
            ],
            '9' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'proprietari.apartamente.~actions',
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
        return self::$instance = new ApartamenteProprietarRecord('apartamente_proprietar');
    }

}