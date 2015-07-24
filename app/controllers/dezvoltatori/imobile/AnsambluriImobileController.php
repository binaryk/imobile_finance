<?php

namespace Imobiliare\Datatable;

class AnsambluriImobileController extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index($id, $id_ansamblu){
        if( ! ( $ansamblu = \Imobiliare\AnsambluRezidential::getRecord( (int) $id_ansamblu) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        if( ! ( $dezvoltator = \Imobiliare\Dezvoltator::getRecord( (int) $ansamblu->id_dezvoltator) ) ){
            return \Redirect::route('dezvoltatori-index');
        }



        $config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$id_ansamblu; 
        $config['breadcrumbs'] = [
            [
            'name' => 'Dezvoltatori',
            'url'  => "dezvoltatori-index",
            'ids' => ''
            ],
            [
            'name' => 'Ansambluri rezidentiale',
            'url'  => "dezvoltatori_ansambluri" ,
            'ids' => [ 'id' => 'dezvoltator-ansambluri', 'id_dezvoltator' => $dezvoltator->id ]
            ],
            [
            'name' => 'Imobile',
            'url'  => "ansamblu_imobil",
            'ids' => [ 'id' => 'ansamblu_imobile', 'id_ansamblu' => $id_ansamblu ]
            ]
        ];
        $this->show( $config + ['other-info' => [ 'ansamblu' => $ansamblu]] );
    }

    public function rows($id, $id_ansamblu){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id); 
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'ansamblu' => 'imobile.id_ansamblu = '.$id_ansamblu ]);
        return $this->dataset( $config );
    }
}