<?php
namespace Imobiliare\Datatable;

class CladireApartamenteController extends \Datatable\DatatableController
{
    protected $layout = 'template.layout';

    public function index($id, $id_cladire)
    {
        if (!($cladire = \Imobiliare\Cladire::getRecord((int)$id_cladire))){
            return \Redirect::route('dezvoltatori-index');
        }
        if( ! ( $imobil = \Imobiliare\Imobil::getRecord( (int) $cladire->id_imobil) ) ){


            return \Redirect::route('dezvoltatori-index');
        }

        if( ! ( $ansamblu = \Imobiliare\AnsambluRezidential::getRecord( (int) $imobil->id_ansamblu) ) ){
            return \Redirect::route('dezvoltatori-index');
        }

        if( ! ( $dezvoltator = \Imobiliare\Dezvoltator::getRecord( (int) $ansamblu->id_dezvoltator) ) ){
            return \Redirect::route('dezvoltatori-index');
        }
        $config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$id_cladire;
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
                'name' => 'Cladiri imobil',
                'url'  => "cladire_imobil",
                'ids' => [ 'id' => 'cladire_imobil', 'id_imobil' => $cladire->id_imobil ]
            ],
            [
                'name' => 'Apartamente cladire',
                'url'  => "cladire_apartament",
                'ids' => [ 'id' => 'cladire_apartament', 'id_cladire' => $id_cladire]
            ]
        ];
        $config['right_menu'] = [['caption' => 'Adaugă apartament', 'class' => 'action-insert-record']];
        $this->show($config + ['other-info' => ['cladire' => $cladire, 'current_org' => $this->current_org]]);
    }

    public function rows($id, $id_cladire)
    {
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters($filters + ['cladire' => 'apartamente.id_cladire = ' . $id_cladire]);
        return $this->dataset($config);
    }
}