<?php

class CautaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cautas
	 *
	 * @return Response
	 */
	public function index()
	{
		$cartiere    = Cartier::all()->toArray();
		$tip_cladiri = TipCladire::all()->toArray();
		$etaje        = TipEtaj::all()->toArray();
		$tip_compartimente = TipCompartiment::all()->toArray();
		$finisaje_interioare = TipFinisajeInterne::all()->toArray();


		return View::make('cauta.index')->with(compact('cartiere','tip_cladiri','etaje','tip_compartimente','finisaje_interioare'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cautas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cautas
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /cautas/{id}
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
	 * GET /cautas/{id}/edit
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
	 * PUT /cautas/{id}
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
	 * DELETE /cautas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}