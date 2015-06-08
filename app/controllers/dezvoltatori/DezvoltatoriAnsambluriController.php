<?php

namespace Imobiliare\Datatable;

class DezvoltatoriAnsambluriController extends \Datatable\DatatableController{
    protected $layout = 'template.layout';

    public function index($id, $id_dezvoltator){
        \Debugbar::info('$id_dezvoltator '.$id_dezvoltator);
        \Debugbar::info('$id '.$id);
        if( ! ( $dezvoltator = \Imobiliare\Dezvoltator::getRecord( (int) $id_dezvoltator) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        $config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$id_dezvoltator;
        $config['breadcrumbs'] = [
            [
            'name' => 'Dezvoltatori',
            'url'  => "dezvoltatori-index",
            'ids' => ''
            ],
            [
            'name' => 'Ansambluri rezidentiale',
            'url'  => "dezvoltatori_ansambluri" ,
            'ids' => [ 'id' => 'dezvoltator-ansambluri' ]
            ]
        ];
        $this->show( $config + ['other-info' => [ 'dezvoltator' => $dezvoltator]] );
    }

    public function rows($id, $id_dezvoltator){
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'dezvoltator' => 'ansambluri_rezidentiale.id_dezvoltator = '.$id_dezvoltator ]);
        return $this->dataset( $config );
    }
}