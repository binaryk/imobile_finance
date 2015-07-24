<?php

namespace Imobiliare\Imobile\Grid;

class DezvoltatoriAnsambluriRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'dezvoltatori.ansambluri.index'; 
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Ansambluri rezidentiale';
        $this->toolbar        = 'dezvoltatori.ansambluri.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\DezvoltatoriAnsambluri';
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
        $this->row_source     = 'dezvoltatori-ansambluri-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                ansambluri_rezidentiale.*,
                                                dezvoltatori.nume AS dezvoltator,
                                                tip_stadii_ansamblu.nume AS stadiu
                                                FROM ansambluri_rezidentiale
                                                LEFT JOIN dezvoltatori
                                                ON ansambluri_rezidentiale.id_dezvoltator = dezvoltatori.id
                                                LEFT JOIN tip_stadii_ansamblu
                                                ON ansambluri_rezidentiale.id_tip_stadiu_ansamblu = tip_stadii_ansamblu.id
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM ansambluri_rezidentiale :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM ansambluri_rezidentiale';
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
                'id'        => 'dezvoltator',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Dezvoltator', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'dezvoltator',
            ],
            '3' => [
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ansamblu', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'nume',
            ],
            
            '4' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefon ansamblu', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'telefon',
            ],
            
            '5' => [
                'id'        => 'anul_infiintarii',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'An infiintare ansamblu', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'anul_infiintarii',
            ],

            '6' => [
                'id'        => 'strada',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Strada ansamblu', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'strada',
            ],

            '7' => [
                'id'        => 'stadiu',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Stadiu ansamblu', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'stadiu',
            ],

            '8' => [
                'id'        => 'detalii',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Detalii ansamblu', 'style'   => 'width:30%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.~detalii',
            ],

            '9' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acţiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'ansambluri_rezidentiale.id, ansambluri_rezidentiale.nume, ansambluri_rezidentiale.telefon',
            'orderables'  => [1 => 'nume'],
        ];
        $this->filters = [
            'deleted' => 'ansambluri_rezidentiale.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new DezvoltatoriAnsambluriRecord('dezvoltator-ansambluri');
    }

}