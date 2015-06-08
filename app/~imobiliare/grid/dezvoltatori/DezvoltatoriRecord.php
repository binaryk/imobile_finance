<?php

namespace Imobiliare\Imobile\Grid;

class DezvoltatoriRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.index';
        $this->breadcrumbs = [
            [
            'name' => 'Dezvoltatori',
            'url'  => "dezvoltatori-index",
            'ids' => ''
            ]
        ];
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Dezvoltatori';
        $this->toolbar        = 'dezvoltatori.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\Dezvoltatori';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js, admin/js/libraries/form/combobox.js, admin/js/dezvoltatori/dezvoltatori.js';
        $this->row_source     = 'dezvoltatori-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                dezvoltatori.*,
                                                 judete.nume as judet
                                                FROM dezvoltatori
                                                left join judete on dezvoltatori.id_judet = judete.id
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM dezvoltatori :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM dezvoltatori';
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
                'header'    => ['caption' => 'Nume dezvoltator', 'style'   => 'width:18%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.nume',
            ],
            '3' => [
                'id'        => 'adresa',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'adresa',
            ],
            '4' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefon', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ],
            '5' => [
                'id'        => 'judet',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Judet', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'judet',
            ],
            '6' => [
                'id'        => 'email',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'E-mail', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'email',
            ],
            '7' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, nume',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'dezvoltatori.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new DezvoltatoriRecord('dezvoltatori');
    }

}