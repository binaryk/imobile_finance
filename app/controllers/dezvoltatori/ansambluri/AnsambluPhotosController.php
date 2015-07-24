<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/16/2015
 * Time: 1:31 PM
 */

namespace Imobiliare\Datatable;


class AnsambluPhotosController extends \Datatable\DatatableController
{
    protected $layout 		= 'template.layout';

    public function index($id, $id_ansamblu)
    {
        // daca nu am un Imobiliare-ul revin la pagina cu Imobiliarei
        if( ! ($ansamblu= \Imobiliare\AnsambluRezidential::getRecord( (int) $id_ansamblu)) )
        {
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
                'name' => 'Ansambluri',
                'url'  => "dezvoltatori_ansambluri" ,
                'ids' => [ 'id' => 'dezvoltator-ansambluri', 'id_dezvoltator' => $ansamblu->id_dezvoltator ]
            ],
            [
                'name' => 'Poze',
                'url'  => "ansamblu_photo" ,
                'ids' => [ 'id' => 'ansamblu_photo', 'id_ansamblu' => $id_ansamblu ]
            ]
        ];

        // $config['caption'] .= ' pentru apartamentul <span class="text-blue">' . $Imobiliare->nume . '</span>';

        // $photos = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament',$id_ansamblu)->select('file_name')->get()->toArray();
        $photos = \Imobiliare\Nomenclatoare\AnsambluPhotos::where('id_ansamblu', $ansamblu->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get();
        if( count($photos) > 0 )
            $config['right_menu'] = [
                ['caption' => 'Adaug&#259; poze', 'class' => 'action-insert-record'],
                ['caption' => 'Vezi poze', 'class' => 'action-slider'],
            ];
        else
            $config['right_menu'] = [
                ['caption' => 'Adaug&#259; poze', 'class' => 'action-insert-record'],
            ];

        $out_photos = [];
        foreach ($photos as $key => $photo) {
            $test = explode( '/', $photos[$key]['file_name']);
            $out_photos[] = \URL::to('../app/storage/uploads/') . '/' . $id_ansamblu . '/' . end( $test );
        }
        $config['row-source'] .= '/' . $id_ansamblu;
        $this->show( $config + ['other-info' => ['ansamblu' => $ansamblu, 'photos' => $out_photos, 'images' => $photos]]);
    }

    public function rows($id, $id_ansamblu)
    {
        $config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + ['ansamblu' => 'id_ansamblu= ' . $id_ansamblu, 'deleted2' => 'uploaded_photos.deleted_at is null'] );
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

    public function upload($id_ansamblu)
    {
        $input = \Input::all();
        return
            \Database\Actions::make()
                ->model('\Imobiliare\Nomenclatoare\AnsambluPhotos')
                ->data(['id_ansamblu' => $id_ansamblu, 'id_user' => $this->current_user->id ])
                ->upload($input['file_data'], \Config::get('uploads.ansamblu-photos') );
    }

    public function delete()
    {
        return \Imobiliare\Nomenclatoare\AnsambluPhotos::deleteFile(\Input::get('id'), $this->current_user->id);
    }

    public function download( $document_id )
    {
        return \Imobiliare\Nomenclatoare\AnsambluPhotos::downloadFile($document_id);
    }
}