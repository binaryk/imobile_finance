<?php

namespace Apartamente;

class CautareApartamenteController extends \Datatable\DatatableController
{

	// sa nu uitam de userul curent (organizatia) curenta

	protected $layout 		= 'template.layout';

	public function index()
	{
		$config = \Imobiliare\Grids::make('cauta-apartamente')->toIndexConfig('cauta-apartamente');

		$config['caption'] = '<span class="font-blue">Cautare</span> apartamente. Organizatia: ' . $this->current_org->denumire;
		
		$this->show( $config + ['other-info' => [
			'current_org' => $this->current_org,
			'controls' => $this->controls()
		]]);
	}

	public function rows()
	{
		$config = \Imobiliare\Grids::make('cauta-apartamente')->toRowDatasetConfig('cauta-apartamente');
		$filters = $config['source']->custom_filters();
		$config['source']->custom_filters( $filters + [
			'oferta-valabila' => 'v_apartamente.id_organizatie = ' . $this->current_org->id,
		]);
		return $this->dataset( $config );
	}

	public function showDetails($id)
	{
		$apartament = \Imobiliare\Apartament::find($id);
		if( ! $apartament )
		{
			return \Redirect::route('cautare-apartamente-index');
		}
		$this->layout->breadcrumbs = [
            [
            'name' => 'Cautare apartamente',
            'url'  => "cautare-apartamente-index",
            'ids' => ''
            ],
            [
            'name' => 'Detalii apartament',
            'url'  => "apartament-detalii-oferta",
            'ids' =>  $id
            ]  
        ];
		$this->layout->content = \View::make('apartamente.detalii.index')->with([
			'record'   		=> $apartament,
			'photos'        => \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament', $apartament->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get(),
			'sections'      => [
				'tab1' => [
					'caption' => 'Localizare',
					'view' => '1'
				],
				'tab2' => [
					'caption' => 'Date generale',
					'view' => '2'
				],
				'tab3' => [
					'caption' => 'Date suplimentare',
					'view' => '3'
				],
				'tab4' => [
					'caption' => 'Poze',
					'view' => '4'
				],
				'tab5' => [
					'caption' => 'Proprietar',
					'view' => '5'
				]
			]
		]);
	}

	public function downloadPDF($id)
	{
		$apartament = \Imobiliare\Apartament::find($id);
		if( ! $apartament )
		{
			return \Redirect::route('cautare-apartamente-index');
		}
		$pdf = new CreateOfertaPdf('P', 'A4', 'D', $apartament);
		$pdf->Output();
	}

	public function openPDF($id)
	{
		$apartament = \Imobiliare\Apartament::find($id);
		if( ! $apartament )
		{
			return \Redirect::route('cautare-apartamente-index');
		}
		$pdf = new CreateOfertaPdf('P', 'A4', 'I', $apartament);
		$pdf->Output();
	}

	public function loadPhoto()
	{
		$photo = \Imobiliare\Nomenclatoare\ApartamentPhotos::find( (int) \Input::get('id_photo') );
		return 
			\Response::json(['img' => '<img src="' . (string) \Image::make($photo->file_name)->resize(480, NULL, function ($constraint){$constraint->aspectRatio(); $constraint->upsize();})->encode('data-url') . '" style="width: 480px; display: block;"/>']);
	}

	protected function controls()
	{
		// cum se face resetarea filtrarii???

		return [
			// [1] = daca oferta este valabila sa nu
			'oferta-valabila' =>
				\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('oferta_valabila')->caption('Oferta valabila')
				->class('form-control input-sm data-source')
				->controlsource('oferta_valabila')->controltype('combobox')
				->options([-1 => 'Toate (cu oferta valabila sau nu)', 0 => 'Fara oferta valabila', 1 => 'Doar cele cu oferta valabila']),
			// [2] = parte din adresa
			'adresa-exacta' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('adresa_exacta')
				->caption('Adresa')
				->placeholder('Adresa')
				->class('form-control data-source input-sm')
				->controlsource('adresa_exacta')
				->controltype('textbox')
				->maxlength(255),
			// [3] = numarul de camere
			'nr_camere_min' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_camere_min')
				->caption('Numarul de camere')
				->placeholder('De la')
				->class('form-control data-source input-sm')
				->controlsource('nr_camere_min')
				->controltype('textbox'),
			'nr_camere_max' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_camere_max')
				->caption('&nbsp;')
				->placeholder('Pana la')
				->class('form-control data-source input-sm')
				->controlsource('nr_camere_max')
				->controltype('textbox'),
			// [4] = pretul
			'pret_m2_min' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('pret_m2_min')
				->caption('Pretul')
				->placeholder('De la')
				->class('form-control data-source input-sm')
				->controlsource('pret_m2_min')
				->controltype('textbox'),
			'pret_m2_max' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('pret_m2_max')
				->caption('&nbsp;')
				->placeholder('Pana la')
				->class('form-control data-source input-sm')
				->controlsource('pret_m2_max')
				->controltype('textbox'),
			// [5] = daca este agentie sau nu
			'is_agentie' =>
				\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('is_agentie')->caption('Este agentie')
				->class('form-control input-sm data-source')
				->controlsource('is_agentie')->controltype('combobox')
				->options([-1 => 'Toate (agentii sau nu)', 0 => 'Fara agentii', 1 => 'Doar agentiile']),
			// [6] = data ultima actualizare
			'ultima_actualizare' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('perioada')
				->caption('Perioada ultimei actualizari')
				->placeholder('Perioada ultimei actuzlizari')
				->value('01.01.1965 - ' . \Carbon\Carbon::now()->format('d.m.Y'))
				->class('form-control input-sm perioada-picker')
				->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL]),
			// [7] = telefon, telefon 1, telefon 2
			'telefon' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('telefon')
				->caption('Numar de telefon')
				->placeholder('Telefon')
				->class('form-control data-source input-sm')
				->controlsource('telefon')
				->controltype('textbox')
				->maxlength(255),
			// [8] = daca este credit prima casa sau nu
			'credit_prima_casa' =>
				\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('credit_prima_casa')->caption('Accepta credit prima casa')
				->class('form-control input-sm data-source')
				->controlsource('credit_prima_casa')->controltype('combobox')
				->options([-1 => 'Toate (accepta sau nu)', 0 => 'Nu accepta', 1 => 'Accepta']),
			// [9] = etajul
			'nr_etaj_min' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_etaj_min')
				->caption('Numarul de etaje')
				->placeholder('De la')
				->class('form-control data-source input-sm')
				->controlsource('nr_etaj_min')
				->controltype('textbox'),
			'nr_etaj_max' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_etaj_max')
				->caption('&nbsp;')
				->placeholder('Pana la')
				->class('form-control data-source input-sm')
				->controlsource('nr_etaj_max')
				->controltype('textbox'),
			// [10] = tip finisare
			'id_tip_finisaje_interioare' =>
				\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_finisaje_interioare')->caption('Finisaje interioare')
				->class('form-control input-sm data-source')
				->controlsource('id_tip_finisaje_interioare')->controltype('combobox')
				->options(\Imobiliare\Nomenclator\TipFinisajeInterioare::ToCombobox()),
			// [11] = compartimentare
			'id_tip_compartiment' =>
				\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_compartiment')->caption('Tip compartiment')
				->class('form-control input-sm data-source')
				->controlsource('id_tip_compartiment')->controltype('combobox')
				->options(\Imobiliare\Nomenclator\TipCompartiment::ToCombobox())
		];
	}
}