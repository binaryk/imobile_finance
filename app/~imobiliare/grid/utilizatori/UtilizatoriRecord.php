<?php

namespace Utilizatori\Grid;

class UtilizatoriRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'users.lista.index'; 
        $this->icon           =  NULL;
        $this->caption        = 'Lista utilizatorilor';
        $this->toolbar        = 'users.lista.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 25;
        $this->default_order  = "0,'asc'";
        $this->form           = NULL;
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css, admin/css/dt/dtform.css';
        $this->js             = 'admin/js/libraries/form/dtform.js';
        $this->row_source     = 'grid-utilizatori-row-source';
        $this->rows_source_sql = '
            SELECT
                users.*,
                organizatii.denumire as organizatie_denumire,
                organizatii.telefon as organizatie_telefon,
                organizatii.fax as organizatie_fax,
                organizatii.email as organizatie_email
            FROM users
            LEFT JOIN organizatii ON users.id_organizatie = organizatii.id
            :where: :order:
            ';
        $this->count_filtered_records_sql 	= '
            SELECT 
                COUNT(*) as cnt 
            FROM users 
            LEFT JOIN organizatii ON users.id_organizatie = organizatii.id
            :where:
            ';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM users';
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
                'id'        => 'nume-prenume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numele şi prenumele', 'style'   => 'width:15%;text-align:left',],
                'type'      => 'view',
                'source'    => 'users.lista.~nume',
            ], 
            '3' => [
                'id'        => 'email',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Email', 'style'   => 'width:15%;text-align:left',],
                'type'      => 'field',
                'source'    => 'email',
            ], 
            '4' => [
                'id'        => 'telefon',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Telefon', 'style'   => 'width:15%;text-align:left',],
                'type'      => 'field',
                'source'    => 'telefon',
            ], 
            '5' => [
                'id'        => 'organizatie',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Organizatie', 'style'   => 'width:50%;text-align:left',],
                'type'      => 'view',
                'source'    => 'users.lista.~organizatie',
            ], 
       ];  
        $this->fields = [
            'fields'      => '',
            'searchables' => '',
            'orderables'  => [],
        ];
        $this->filters = [];
    }

    public static function create()
    {
        return self::$instance = new UtilizatoriRecord('utilizatori');
    }

}