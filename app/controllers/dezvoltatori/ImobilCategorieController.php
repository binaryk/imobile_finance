<?php

namespace Imobiliare\Datatable;

class ImobilCategorieController extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index($id, $id_imobil){
        
        if( ! ( $imobil = \Imobiliare\Imobil::getRecord( (int) $id_imobil) ) ){
            return \Redirect::route('dezvoltatori-index');
        } 

         if( $imobil->id_tip_categorie == 1 ){
            return \Redirect::route('cladire_imobil', ['id' => 'cladire_imobil', 'id_imobil' => $id_imobil]);
        }
        
        if( $imobil->id_tip_categorie == 2 ){
            return \Redirect::route('apartament_imobil', ['id' => 'apartament_imobil', 'id_imobil' => $id_imobil]);
        }

        if( $imobil->id_tip_categorie == 3 ){
            return \Redirect::route('teren_imobil', ['id' => 'teren_imobil', 'id_imobil' => $id_imobil]);
        }
    }

    public function rows($id, $id_imobil){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id); 
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'ansamblu' => 'imobile.id_ansamblu = '.$id_imobil ]);
        return $this->dataset( $config );
    }
}