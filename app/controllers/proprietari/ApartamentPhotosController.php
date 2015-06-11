<?php

namespace Imobiliare\Datatable;

class ApartamentPhotosController extends \Datatable\DatatableController 
{
	protected $layout 		= 'template.layout';

	public function index($id, $id_apartament)
	{
		// daca nu am un Imobiliare-ul revin la pagina cu Imobiliarei
		if( ! ($apartament = \Imobiliare\Apartament::getRecord( (int) $id_apartament)) )
		{
			return \Redirect::route('proprietar-index');
		}

		$config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
		// $config['caption'] .= ' pentru apartamentul <span class="text-blue">' . $Imobiliare->nume . '</span>';
		$photos = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament',$id_apartament)->select('file_name')->get()->toArray();
		foreach ($photos as $key => $photo) {
			$test = explode( '/', $photos[$key]['file_name']);
			$out_photos[] = \URL::to('../app/storage/uploads/') . '/' . $id_apartament . '/' . end( $test );
		}
 
//app_path() .
		$config['row-source'] .= '/' . $id_apartament;
		$this->show( $config + ['other-info' => ['apartament' => $apartament, 'photos' => $out_photos]]);
	}

	public function rows($id, $id_apartament)
	{
		$config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
		$filters = $config['source']->custom_filters();
		$config['source']->custom_filters( $filters + ['apartament' => 'id_apartament = ' . $id_apartament] );
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
			->upload($input['file_data'], \Config::get('uploads.apartament-photos') );
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