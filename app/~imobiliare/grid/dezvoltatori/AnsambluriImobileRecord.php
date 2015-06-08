<?php

namespace Imobiliare\Imobile\Grid;

class AnsambluriImobileRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Imobile';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\AnsambluriImobile';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js';
        $this->row_source     = 'ansamblu-imobil-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    imobile.*,
                                                    ansambluri_rezidentiale.nume as ansamblu,
                                                    tip_categorie_imobil.nume as categorie
                                                FROM imobile
                                                LEFT JOIN ansambluri_rezidentiale
                                                ON ansambluri_rezidentiale.id = imobile.id_ansamblu
                                                LEFT JOIN tip_categorie_imobil
                                                ON tip_categorie_imobil.id = imobile.id_tip_categorie
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM imobile :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM imobile';
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
                'id'        => 'ansamblu',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ansamblu rezidential', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'ansamblu',
            ],
            '3' => [
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Imobil', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'nume',
            ],
            '4' => [
                'id'        => 'categorie',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Categorie imobil', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'categorie',
            ],
            '5' => [
                'id'        => 'suprafata_min',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata minima', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'suprafata_min',
            ],
            '6' => [
                'id'        => 'suprafata_max',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafata maxima', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'suprafata_max',
            ],

            '7' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, nume',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'imobile.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new AnsambluriImobileRecord('ansamblu_imobile');
    }

}