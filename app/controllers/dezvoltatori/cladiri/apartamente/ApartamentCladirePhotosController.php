<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/22/2015
 * Time: 11:22 AM
 */

namespace Imobiliare\Datatable;


class ApartamentCladirePhotosController extends \Datatable\DatatableController
{
    protected $layout 		= 'template.layout';

    public function index($id, $id_apartament)
    {
        // daca nu am un Imobiliare-ul revin la pagina cu Imobiliarei
        if( ! ($apartament = \Imobiliare\Apartament::getRecord( (int) $id_apartament)) )
        {
            return \Redirect::route('dezvoltatori-index');
        }

        if (!($cladire = \Imobiliare\Cladire::getRecord((int) $apartament->id_cladire))){
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
                'ids' => [ 'id' => 'cladire_apartament', 'id_cladire' => $apartament->id_cladire]
            ],
            [
                'name' => 'Poze apartament',
                'url'  => "apartament_cladire_photo",
                'ids' => [ 'id' => 'apartament_cladire_photo', 'id_apartament' => $id_apartament]
            ]
        ];

        $photos = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament', $apartament->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get();
        if( count($photos) > 0 )
            $config['right_menu'] = [
                ['caption' => 'Adaugă poze', 'class' => 'action-insert-record'],
                ['caption' => 'Vezi poze', 'class' => 'action-slider'],
            ];
        else
            $config['right_menu'] = [
                ['caption' => 'Adaugă poze', 'class' => 'action-insert-record'],
            ];

        $out_photos = [];
        foreach ($photos as $key => $photo) {
            $test = explode( '/', $photos[$key]['file_name']);
            $out_photos[] = \URL::to('../app/storage/uploads/') . '/cladiri/apartamente/' . $id_apartament . '/' . end( $test );
        }
        $config['row-source'] .= '/' . $id_apartament;
        $this->show( $config + ['other-info' => ['apartament' => $apartament, 'photos' => $out_photos, 'images' => $photos]]);
    }

    public function rows($id, $id_apartament)
    {
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + ['apartament' => 'id_apartament = ' . $id_apartament, 'deleted2' => 'uploaded_photos.deleted_at is null'] );
        return $this->dataset( $config );
    }

    public function loadForm($id)
    {
        return $this->get_dtform_properties( \Input::all() );
    }

    public function doAction()
    {
        return $this->do_action( \Input::all() );
    }

    public function upload($id_apartament)
    {
        $input = \Input::all();
        return
            \Database\Actions::make()
                ->model('\Imobiliare\Nomenclatoare\ApartamentPhotos')
                ->data(['id_apartament' => $id_apartament, 'id_user' => $this->current_user->id ])
                ->upload($input['file_data'], \Config::get('uploads.apartament-cladire-photos') );
    }

    public function delete()
    {
        return \Imobiliare\Nomenclatoare\ApartamentPhotos::deleteFile(\Input::get('id'), $this->current_user->id);
    }

    public function download( $document_id )
    {
        return \Imobiliare\Nomenclatoare\ApartamentPhotos::downloadFile($document_id);
    }
}