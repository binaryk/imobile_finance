<?php

class ImobileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /imobiles
	 *
	 * @return Response
	 */
	public function index()
	{
		$imobils = Imobile::with(
				'localitate', 
				'judet', 
				'cartier', 
				'nrcam', 
				'etajapartament', 
				'compartiment',
				'finint')->get();
		return View::make('imobiles.index')->with(compact('imobils'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /imobiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$localitati = Localitati::where('id_judet', 12)->lists('denumire','id'); 
		$cartiere    = Cartier::where('localitate_id', '5350')->lists('denumire', 'id');
		$camere     = TipNrCamere::lists('nr_camere', 'id');
		$tip_cladire= TipCladire::lists('denumire', 'id');
		$tip_nr_etaje  = TipNrEtaje::lists('nr_etaje', 'id');
		$judete = Judet::lists('denumire', 'id');
		$finisaje_exterioare = TipFinisajeExterne::lists('denumire', 'id');
		$finisaje_interioare = TipFinisajeInterne::lists('denumire', 'id');
		$tip_mobilare = TipMobilare::lists('denumire', 'id');
		$tip_etaje = TipEtaj::lists('denumire', 'id');
		$tip_compartiment = TipCompartiment::lists('denumire', 'id');
		
		return View::make('imobiles.create')->with(
			compact(
					'localitati',
					'cartiere',
					'camere',
					'tip_cladire', 
					'tip_nr_etaje', 
					'judete', 
					'finisaje_exterioare', 
					'finisaje_interioare',
					'tip_mobilare',
					'tip_etaje',
					'tip_compartiment'
				)
			);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /imobiles
	 *
	 * @return Response
	 */
	public function store()
	{
		$create = Imobile::create(
			array(
				'judet_id' => Input::get('judet_id'),
				'localitate_id' => Input::get('localitate_id'),
				'cartier_id' => Input::get('cartier_id'),
				'nr_camere' => Input::get('nr_camere'),
				'strada_cladire' => Input::get('strada_cladire'),
				'nr_cladire' => Input::get('nr_cladire'),
				'tip_cladire' => Input::get('tip_cladire'),
				'nr_apartament' => Input::get('nr_apartament'),
				'nr_etaje_cladire' => Input::get('nr_etaje_cladire'),
				'pret_vanzare_euro' => Input::get('pret_vanzare_euro'),
				'pret_negociabil' => (Input::get('pret_negociabil') ? '1' : '0'),
				'data_aparitie_anunt' => Input::get('data_aparitie_anunt'),
				'data_ultimei_actualizari' => Input::get('data_ultimei_actualizari'),
				'valabilitate_oferta' => (Input::get('valabilitate_oferta') ? '1' : '0'),
				'nume_vanzator' => Input::get('nume_vanzator'),
				'telefon_principal' => Input::get('telefon_principal'),
				'telefon_1' => Input::get('telefon_1'),
				'telefon_2' => Input::get('telefon_2'),
				'extras_cf' => (Input::get('extras_cf') ? '1' : '0'),
				'observatii_generale' => Input::get('observatii_generale'),
			)
		);
		Notification::success('Ati adaugat cu succes.');
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /imobiles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$localitati = Localitati::where('id_judet', 12)->lists('denumire','id'); 
		$cartiere    = Cartier::where('localitate_id', '5350')->lists('denumire', 'id');
		$camere     = TipNrCamere::lists('nr_camere', 'id');
		$tip_cladire= TipCladire::lists('denumire', 'id');
		$tip_nr_etaje  = TipNrEtaje::lists('nr_etaje', 'id');
		$judete = Judet::lists('denumire', 'id');
		$finisaje_exterioare = TipFinisajeExterne::lists('denumire', 'id');
		$finisaje_interioare = TipFinisajeInterne::lists('denumire', 'id');
		$tip_mobilare = TipMobilare::lists('denumire', 'id');
		$tip_etaje = TipEtaj::lists('denumire', 'id');
		$tip_compartiment = TipCompartiment::lists('denumire', 'id');

		$imobil = Imobile::with(
				'localitate', 
				'judet', 
				'cartier', 
				'nrcam', 
				'etajapartament', 
				'compartiment',
				'finint')->where('id', $id)->first();

		return View::make('imobiles.edit')->with(
			compact(
					'localitati',
					'cartiere',
					'camere',
					'tip_cladire', 
					'tip_nr_etaje', 
					'judete', 
					'finisaje_exterioare', 
					'finisaje_interioare',
					'tip_mobilare',
					'tip_etaje',
					'tip_compartiment',
					'imobil'
				)
			);
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return Input::all();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /imobiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}