<?php
namespace Imobiliare\Imobile\Grid;
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/12/2015
 * Time: 11:59 AM
 */
class AgentiiRecord extends \Imobiliare\GridsRecord
{
    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'agentii.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Agentii';
        $this->toolbar        = 'agentii.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Imobile\Form\Agentii';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js';
        $this->row_source     = 'agentii-row-source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM agentii
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM agentii :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM agentii';
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
                'header'    => ['caption' => 'Nume agentie', 'style'   => 'width:45%',],
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
                'header'    => ['caption' => 'Actiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'agentii.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, telefon',
            'orderables'  => [1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new AgentiiRecord('agentii');
    }

}