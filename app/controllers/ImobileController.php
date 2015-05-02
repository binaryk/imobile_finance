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
		return View::make('imobiles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /imobiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$localitati = Localitati::lists('denumire','id'); 
		$cartiere    = Cartier::lists('denumire', 'id');
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
		//
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
		//
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