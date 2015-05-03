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
		$imobils = Imobile::with(
				'localitate', 
				'judet', 
				'cartier', 
				'nrcam', 
				'etajapartament', 
				'compartiment',
				'finint',
				'tip_cladire'
				)->get();
		Debugbar::info($imobils->toArray());
		return View::make('cauta.index')->with(compact('cartiere','tip_cladiri','etaje','tip_compartimente','finisaje_interioare','imobils'));
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
	public function show()
	{ 
		$where = "";
		$query = "
			SELECT 
			imobile.id,
			imobile.pret_vanzare_euro,
			imobile.dotari,
			imobile.valabilitate_oferta, 
			localitati.denumire as localitate,
			judete.denumire as judet,
			cartier.denumire as cartier,
			tip_nr_camere.nr_camere as nr_camere,
			tip_etaj.denumire as tip_etaj,
			tip_compartiment.denumire as tip_compartiment,
			tip_finisaje_interne.denumire as finisaje_interne
			FROM 
			imobile LEFT JOIN localitati
			ON imobile.localitate_id = localitati.id
			LEFT JOIN judete
			ON imobile.judet_id = judete.id
			LEFT JOIN cartier
			ON imobile.cartier_id = cartier.id
			LEFT JOIN tip_nr_camere
			ON imobile.nr_camere = tip_nr_camere.id
			LEFT JOIN tip_etaj
			ON imobile.etaj_apartament = tip_etaj.id
			LEFT JOIN tip_compartiment
			ON imobile.compartiment_apartament = tip_compartiment.id
			LEFT JOIN tip_finisaje_interne
			ON imobile.finisaje_interioare = tip_finisaje_interne.id
			LEFT JOIN tip_cladire
			ON imobile.tip_cladire = tip_cladire.id
			WHERE
		";
		$valabilitatea = Input::has('valabilitate_oferta') ? 1 : 0;
		$where .= " imobile.valabilitate_oferta = ".$valabilitatea;
		$cartier_id   = Input::get('cartier_id') ? Input::get('cartier_id') : -1;
		if( $cartier_id > -1 )
			$where .= " AND imobile.cartier_id = ".$cartier_id;
		if( Input::get('strada_cladire') != NULL )
			$where .= " AND imobile.strada_cladire LIKE '%".Input::get('strada_cladire')."%'";
		if( Input::get('nr_camere') != NULL )
			$where .= " AND tip_nr_camere.nr_camere LIKE '%".Input::get('nr_camere')."%'";
		
		if( Input::get('pret_vanzare_min') != NULL && Input::get('pret_vanzare_max') != NULL)
			$where .= " AND imobile.pret_vanzare_euro >= ".Input::get('pret_vanzare_min')." AND imobile.pret_vanzare_euro <= ".Input::get('pret_vanzare_max');
		else
			if( Input::get('pret_vanzare_min') != NULL )
				$where .= " AND imobile.pret_vanzare_euro >= ".Input::get('pret_vanzare_min');
		else
			if( Input::get('pret_vanzare_max') != NULL )
				$where .= " AND imobile.pret_vanzare_euro <= ".Input::get('pret_vanzare_max');
		if( Input::get('tip_cladire') != NULL )
			$where .= " AND imobile.tip_cladire LIKE '%".Input::get('tip_cladire')."%'";

		Debugbar::info(Input::all());
		$query .= $where; 
		Debugbar::info($query);

		$imobils = DB::select( DB::raw( $query) );
		Debugbar::info($imobils);

		
		if( Request::ajax() ){
			return $imobils;
		}
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