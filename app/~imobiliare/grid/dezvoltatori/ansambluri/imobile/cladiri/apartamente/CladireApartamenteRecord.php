<?php

namespace Imobiliare\Imobile\Grid;

class CladireApartamenteRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.cladire.apartament.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Apartamente';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.cladire.apartament.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\CladireApartament';
        $this->css            = 'admin/css/dt/dt.css,
                                admin/css/dt/toolbar.css,
                                admin/css/dt/dtform.css,
                                assets/global/plugins/icheck/skins/all.css,
                                assets/global/plugins/bootstrap-datepicker/css/datepicker3.css,
                                assets/global/plugins/bootstrap-select/bootstrap-select.min.css,
                                assets/global/plugins/select2/select2.css,
                                assets/global/css/plugins.css
                                 ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                                 assets/global/plugins/icheck/icheck.min.js,
                                 assets/admin/pages/scripts/form-icheck.js,
                                 assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js,
                                 assets/global/plugins/bootstrap-select/bootstrap-select.min.js,
                                 assets/global/plugins/select2/select2.min.js,
                                 assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js,
                                 assets/admin/pages/scripts/components-pickers.js,
                                 assets/admin/pages/scripts/portlet-draggable.js
                                 ';
        $this->row_source     = 'cladire_apartament-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    apartamente.*,
                                                    cladiri.nume AS cladire,
                                                    cartiere.nume AS cartier,
                                                    tip_finisaje_interioare.nume AS finisaje_interioare
                                                FROM apartamente
                                                LEFT JOIN cladiri
                                                ON cladiri.id = apartamente.id_cladire 
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
                'id'        => 'cladire',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Clădire', 'style'   => 'width:12.8%',],
                'type'      => 'field',
                'source'    => 'cladire',
            ],
            '3' => [
                'id'        => 'nume',
                'orderable' => 'no',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Titlu', 'style'   => 'width:19.85%',],
                'type'      => 'field',
                'source'    => 'nume',
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
                'id'        => 'suprafata',
                'orderable' => 'no',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Suprafața', 'style'   => 'width:12.85%',],
                'type'      => 'field-float',
                'source'    => 'suprafata',
            ],
            '8' => [
                'id'        => 'nr_camere',
                'orderable' => 'yes',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Număr camere', 'style'   => 'width:5.85%',],
                'type'      => 'field',
                'source'    => 'nr_camere',
            ],
            '9' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.cladire.apartament.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id',
            'orderables'  => [],
        ];
        $this->filters = [
            'deleted' => 'apartamente.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new CladireApartamenteRecord('cladire_apartament');
    }

}