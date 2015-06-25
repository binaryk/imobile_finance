<?php
namespace Imobiliare\Datatable;

class ApartamenteProprietarController  extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index($id, $id_proprietar){ 
        if( ! ( $proprietar = \Imobiliare\Proprietar::getRecord( (int) $id_proprietar) ) ){
            return \Redirect::route('proprietar-index');
        }



        $config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$id_proprietar; 
        $config['breadcrumbs'] = [
            [
            'name' => 'Proprietari',
            'url'  => "proprietar-index",
            'ids' => ''
            ],
            [
            'name' => 'Apartamente',
            'url'  => "apartamente_proprietar" ,
            'ids' => [ 'id' => 'apartamente_proprietar', 'id_proprietar' => $id_proprietar ]
            ] 
        ];
        $config['right_menu']= [ ['caption' => 'Adaugă imobil', 'class' => 'action-insert-record'] ];
        $this->show( $config + ['other-info' => [ 'proprietar' => $proprietar, 'current_org' => $this->current_org]] );
    }

    public function rows($id, $id_proprietar){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'proprietar' => 'apartamente.id_proprietar_pf = '.$id_proprietar ]);
        return $this->dataset( $config );
    }
}