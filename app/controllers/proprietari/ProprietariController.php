<?php
namespace Imobiliare\Datatable;

class ProprietariController  extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index(){ 
        $config = \Imobiliare\Grids::make('proprietari')->toIndexConfig('proprietari');
        $config['breadcrumbs'] = [
            [
            'name' => 'Proprietari',
            'url'  => "proprietar-index",
            'ids' => ''
            ]  
        ];
        $this->show( $config + ['other-info' => [ 'current_org' => $this->current_org]] );
    }

    public function rows($id){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'proprietar_org' => 'proprietari_persoane_fizice.id_organizatie = '.$this->current_org->id ]);
        return $this->dataset( $config );
    }
}