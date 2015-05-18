<?php
namespace Imobiliare\Datatable;

class ImobileController extends DatatableController  {

	/**
	 * Display a listing of the resource.
	 * GET /imobiles
	 *
	 * @return Response
	 */
	protected $layout 		= 'template.layout';
		
	public function index($id)
	{

		$config = \Imobiliare\Grids::make($id)->toIndexConfig($id);
		$config['caption'] = 'Lista de proiecte';

		// dd($config);
		$this->show( $config + ['other-info' => []]);

	}

	public function rows($id)
	{
		$config = \Imobiliare\Grids::make($id)->toRowDatasetConfig($id);
		$filters = $config['source']->custom_filters();
		return $this->dataset( $config );
	} 


	public function destroy($id)
	{
		$delete = Imobile::deleteRecord(Input::get('id'));
		if($delete)
			return 1;
		else
			return 0;
	}

}