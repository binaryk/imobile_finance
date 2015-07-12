<?php
namespace Agentii;
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/12/2015
 * Time: 11:38 AM
 */
class AgentiiController extends \Datatable\DatatableController
{

    protected $layout = 'template.layout';

    public function index(){
        $config = \Imobiliare\Grids::make('agentii')->toIndexConfig('agentii');
        $config['breadcrumbs'] = [
            [
                'name' => 'Agentii',
                'url'  => "agentii-index",
                'ids' => ''
            ]
        ];
        $config['right_menu'] = [ ['caption' => 'Adaug&#259; agen&#355;ie', 'class' => 'action-insert-record'] ];
        $this->show( $config + ['other-info' => [ 'current_org' => $this->current_org]] );
    }

    public function rows($id){
        \Debugbar::info($id);

        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
//        $config['source']->custom_filters( $filters + [ 'proprietar_org' => 'proprietari_persoane_fizice.id_organizatie = '.$this->current_org->id ]);
        return $this->dataset( $config );
    }

}
