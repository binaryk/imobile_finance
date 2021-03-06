<?php

namespace Imobiliare\Datatable;

class TerenImobilController extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index($id, $id_imobil){
        
        if( ! ( $imobil = \Imobiliare\Imobil::getRecord( (int) $id_imobil) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        if( ! ( $ansamblu = \Imobiliare\AnsambluRezidential::getRecord( (int) $imobil->id_ansamblu) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        if( ! ( $dezvoltator = \Imobiliare\Dezvoltator::getRecord( (int) $ansamblu->id_dezvoltator) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        $config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$id_imobil; 
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
            'ids' => [ 'id' => 'ansamblu_imobile', 'id_ansamblu' => $ansamblu->id ]
            ],
            [
            'name' => 'Terenuri imobil',
            'url'  => "teren_imobil",
            'ids' => [ 'id' => 'teren_imobil', 'id_imobil' => $id_imobil ]
            ]
        ];
        $this->show( $config + ['other-info' => [ 'imobil' => $imobil]] );
    }

    public function rows($id, $id_imobil){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id); 
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'imobil' => 'terenuri.id_imobil = '.$id_imobil ]);
        return $this->dataset( $config );
    }
}