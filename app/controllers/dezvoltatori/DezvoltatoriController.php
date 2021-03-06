<?php
namespace Imobiliare\Datatable;

class DezvoltatoriController  extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index(){  
        $config = \Imobiliare\Grids::make('dezvoltatori')->toIndexConfig('dezvoltatori');
        $config['breadcrumbs'] = [
            [
                'name' => 'Dezvoltatori',
                'url'  => "dezvoltatori-index",
                'ids' => ''
            ]
        ];
        $config['right_menu'] = [ ['caption' => 'Adaug&#259; dezvoltator', 'class' => 'action-insert-record'] ];
        $this->show( $config + ['other-info' => [ 'current_org' => $this->current_org]] );
    }

    public function rows($id){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'dezvoltator_org' => 'dezvoltatori.id_organizatie = '.$this->current_org->id ]);
        return $this->dataset( $config );
    }
}