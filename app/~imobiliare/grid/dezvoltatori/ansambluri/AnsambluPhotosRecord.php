<?php

namespace Imobiliare\Imobile\Grid;

class AnsambluPhotosRecord extends \Imobiliare\GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);

        $this->view           = 'dezvoltatori.ansambluri.photos._index';
        $this->icon           = 'admin/img/icons/dt/gali.png';
        $this->caption        = 'Imagini';
        $this->toolbar        = 'dezvoltatori.ansambluri.photos.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'Imobiliare\Nomenclatoare\Form\AnsambluPhotos';
        $this->css            = 'admin/css/dt/dt.css, admin/css/dt/toolbar.css,
								 admin/css/dt/dtform.css, 
								 packages/fileinput/css/fileinput.min.css,
								 admin/css/fileinput/fileinput.css, 
								 packages/bxslider/jquery.bxslider.css,
								 assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css';
        $this->js             = 'admin/js/libraries/form/dtform.js,
								 packages/fileinput/js/fileinput.min.js, 
								 packages/bxslider/jquery.bxslider.js,
								 assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js';
        $this->row_source     = 'ansamblu_photo-row-source';
        $this->rows_source_sql 				=
            "
			SELECT 
				uploaded_photos.* 
			FROM uploaded_photos
			:where:
			:order:
			";
        $this->count_filtered_records_sql 	=
            "
			SELECT 
				COUNT(*) as cnt 
			FROM uploaded_photos
			:where:
			";
        $this->count_total_records_sql     	=
            "
			SELECT 
				COUNT(*) as cnt 
			FROM uploaded_photos
			";

        $this->columns        = [
            '1' => [
                'id'        => '#',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => '#', 'style'   => 'width:5%',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ],
            '2' => [
                'id'        => 'nume',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Fi&#351;ier', 'style'   => 'width:60%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.photos.~file_name',
            ],
            '3' => [
                'id'        => 'created_at',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Data cre&#259;rii', 'style'   => 'width:15%',],
                'type'      => 'field-date-time',
                'source'    => 'created_at',
            ],
            '4' => [
                'id'        => 'size',
                'orderable' => 'yes',
                'class'     => 'td-align-right',
                'visible'   => 'yes',
                'header'    => ['caption' => 'M&#259;rime', 'style'   => 'width:10%',],
                'type'      => 'field-file-size',
                'source'    => 'file_size',
            ],
            '5' => [
                'id'        => 'type',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip fi&#351;ier', 'style'   => 'width:5%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.photos.~file_type',
            ],
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Ac&#355;iuni', 'style'   => 'width:5%',],
                'type'      => 'view',
                'source'    => 'dezvoltatori.ansambluri.photos.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'uploaded_photos.file_name',
            'orderables'  => [
                1 => 'uploaded_photos.file_name',
                2 => 'uploaded_photos.file_size',
                3 => 'uploaded_photos.file_extension',
            ],
        ];
        $this->filters = [
            'deleted' => 'uploaded_photos.deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new AnsambluPhotosRecord('ansamblu_photo');
    }

}