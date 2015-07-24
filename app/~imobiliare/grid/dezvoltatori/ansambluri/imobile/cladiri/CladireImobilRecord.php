<?php

namespace Imobiliare\Imobile\Grid;

class CladireImobilRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.imobile.cladire.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Cladiri';
        $this->toolbar        = 'dezvoltatori.ansambluri.imobile.cladire.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\CladireImobil';
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
        $this->row_source     = 'cladire_imobil-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                    cladiri.*,
                                                    imobile.nume AS imobil,
                                                    localitati.nume AS localitate,
                                                    tip_destinatie_cladire.nume AS destinatie,
                                                    tip_regim_inaltime_cladire.nume AS inaltime,
                                                    tip_stadii_ansamblu.nume AS stadiu 
                                                FROM cladiri
                                                LEFT JOIN imobile
                                                ON imobile.id = cladiri.id_imobil
                                                LEFT JOIN localitati
                                                ON localitati.id = cladiri.id_imobil
                                                LEFT JOIN tip_destinatie_cladire
                                                ON tip_destinatie_cladire.id = cladiri.id_tip_destinatie
                                                LEFT JOIN tip_regim_inaltime_cladire
                                                ON tip_regim_inaltime_cladire.id = cladiri.id_tip_regim_inaltime
                                                LEFT JOIN tip_stadii_ansamblu
                                                ON tip_stadii_ansamblu.id = cladiri.id_tip_stadiu 
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM cladiri :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM cladiri';
        $this->columns        = [
        /*id_localitate
        id_tip_destinatie
        id_tip_regim_inaltime
        id_tip_stadiu
        nr_spatii_indivize*/
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
                'header'    => ['caption' => 'Clădire nume', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'nume',
            ], 
            '4' => [
                'id'        => 'localitate',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localitate', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'localitate',
            ], 
            '5' => [
                'id'        => 'destinatie',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Destinatie', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'destinatie',
            ], 
            '6' => [
                'id'        => 'inaltime',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Inaltime', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'inaltime',
            ], 
            '7' => [
                'id'        => 'stadiu',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Stadiu', 'style'   => 'width:15%',],
                'type'      => 'field',
                'source'    => 'stadiu',
            ],
            '8' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.imobile.cladire.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, nume',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'cladiri.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new CladireImobilRecord('cladire_imobil');
    }

}