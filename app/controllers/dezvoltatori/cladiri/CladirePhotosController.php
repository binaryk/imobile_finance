<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/16/2015
 * Time: 1:31 PM
 */

namespace Imobiliare\Datatable;

use Imobiliare\Nomenclatoare\CladirePhotos;

class CladirePhotosController extends \Datatable\DatatableController {
	protected $layout = 'template.layout';

	public function index($id, $id_cladire) {
		// daca nu am un Imobiliare-ul revin la pagina cu Imobiliarei
		if (!($cladire = \Imobiliare\Cladire::getRecord((int) $id_cladire))) {
			return \Redirect::route('dezvoltatori-index');
		}
		if (!($imobil = \Imobiliare\Imobil::getRecord((int) $cladire->id_imobil))) {
			return \Redirect::route('dezvoltatori-index');
		}
		if (!($ansamblu = \Imobiliare\AnsambluRezidential::getRecord((int) $imobil->id_ansamblu))) {
			return \Redirect::route('dezvoltatori-index');
		}
		if (!($dezvoltator = \Imobiliare\Dezvoltator::getRecord((int) $ansamblu->id_dezvoltator))) {
			return \Redirect::route('dezvoltatori-index');
		}

		$config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
		$config['breadcrumbs'] = [
			[
				'name' => 'Dezvoltatori',
				'url' => "dezvoltatori-index",
				'ids' => '',
			],
			[
				'name' => 'Ansambluri',
				'url' => "dezvoltatori_ansambluri",
				'ids' => ['id' => 'dezvoltator-ansambluri', 'id_dezvoltator' => $ansamblu->id_dezvoltator],
			],
			[
				'name' => 'Imobile',
				'url' => "ansamblu_imobil",
				'ids' => ['id' => 'ansamblu_imobile', 'id_ansamblu' => $imobil->id_ansamblu],
			],
			[
				'name' => 'Cladiri',
				'url' => "cladire_imobil",
				'ids' => ['id' => 'cladire_imobil', 'id_imobil' => $cladire->id_imobil],
			],
			[
				'name' => 'Poze',
				'url' => "cladire_photo",
				'ids' => ['id' => 'cladire_photo', 'id_cladire' => $id_cladire],
			],
		];

		// $config['caption'] .= ' pentru apartamentul <span class="text-blue">' . $Imobiliare->nume . '</span>';

		// $photos = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament',$id_cladire)->select('file_name')->get()->toArray();
		$photos = \Imobiliare\Nomenclatoare\CladirePhotos::where('id_cladire', $cladire->id)->where('file_extension', '<>', 'pdf')->orderby('id')->get();
		// dd($photos->first()->file_extension);
		if (count($photos) > 0) {
			$config['right_menu'] = [
				['caption' => 'Adaug&#259; poze', 'class' => 'action-insert-record'],
				['caption' => 'Vezi poze', 'class' => 'action-slider'],
			];
		} else {
			$config['right_menu'] = [
				['caption' => 'Adaug&#259; poze', 'class' => 'action-insert-record'],
			];
		}

		$out_photos = [];
		foreach ($photos as $key => $photo) {
			$test = explode('/', $photos[$key]['file_name']);
			$out_photos[] = \URL::to('../app/storage/uploads/') . '/cladiri/' . $id_cladire . '/' . end($test);
		}
		$config['row-source'] .= '/' . $id_cladire;
		$this->show($config+['other-info' => ['cladire' => $cladire, 'photos' => $out_photos, 'images' => $photos]]);
	}

	public function rows($id, $id_cladire) {
		$config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
		$filters = $config['source']->custom_filters();
		$config['source']->custom_filters($filters+['cladire' => 'id_cladire= ' . $id_cladire, 'deleted2' => 'uploaded_photos.deleted_at is null']);
		return $this->dataset($config);
	}

	public function loadForm($id) {
		return $this->get_dtform_properties(\Input::all());
	}

	public function doAction() {
		return $this->do_action(\Input::all());
	}

	public function upload($id_cladire) {
		$input = \Input::all();
		return
		\Database\Actions::make()
			->model('\Imobiliare\Nomenclatoare\CladirePhotos')
			->data(['id_cladire' => $id_cladire, 'id_user' => $this->current_user->id])
			->upload($input['file_data'], \Config::get('uploads.cladire-photos'));
	}

	public function delete() {
		return \Imobiliare\Nomenclatoare\CladirePhotos::deleteFile(\Input::get('id'), $this->current_user->id);
	}

	public function download($document_id) {
		return \Imobiliare\Nomenclatoare\CladirePhotos::downloadFile($document_id);
	}
}