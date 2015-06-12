<?php

namespace Apartamente;

class CautareApartamenteController extends \Datatable\DatatableController
{

	// sa nu uitam de userul curent (organizatia) curenta

	protected $layout 		= 'template.layout';

	public function index()
	{
		$config = \Imobiliare\Grids::make('cauta-apartamente')->toIndexConfig('cauta-apartamente');

		$config['caption'] = '<span class="font-blue">Cautare</span> apartamente';
		$this->show( $config + ['other-info' => [
		
			'controls' => $this->controls()

		]]);
	}

	public function rows()
	{
		$config = \Imobiliare\Grids::make('cauta-apartamente')->toRowDatasetConfig('cauta-apartamente');
		$filters = $config['source']->custom_filters();
		// $config['source']->custom_filters( $filters + [
		// 	'oferta-valabila' => 'v_apartamente.oferta_valabila = ' . 1 ,
		// ]);
		return $this->dataset( $config );
	}

	protected function controls()
	{
		// cum se face resetarea filtrarii???

		return [
			// [1] = daca oferta este valabila sa nu
			'oferta-valabila' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Cu oferta valabilă?')->name('txt-oferta-valabila')->placeholder('')
				->value('Cu oferta valabila?')->class('form-control input-sm')->enabled(0)
				->addon([
					'before' => \Form::checkbox('oferta_valabila', '1', true, ['class' => 'data-source', 'id' => 'oferta_valabila', 'data-control-source' => 'oferta_valabila', 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]), 
					'after' => NULL
				]),
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
				->controlsource('pret_min')
				->controltype('textbox'),
			'pret_m2_max' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('pret_max')
				->caption('&nbsp;')
				->placeholder('Pana la')
				->class('form-control data-source input-sm')
				->controlsource('Pret_max')
				->controltype('textbox'),
			// [5] = daca este agentie sau nu
			'is_agentie' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Este agentie?')->name('txt-is-agentie')->placeholder('')
				->value('Este agentie?')->class('form-control input-sm')->enabled(0)
				->addon([
					'before' => \Form::checkbox('is_agentie', '1', true, ['class' => 'data-source', 'id' => 'is_agentie', 'data-control-source' => 'is_agentie', 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]), 
					'after' => NULL
				]),
			// [6] = data ultima actualizare
			'ultima_actualizare' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->name('perioada')
				->caption('Perioada ultimei actuzlizari')
				->placeholder('Perioada ultimei actuzlizari')
				->value('01.01.2009 - ' . \Carbon\Carbon::now()->format('d.m.Y'))
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
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Accepta credit prima casa?')->name('txt-credit_prima_casa')->placeholder('')
				->value('Accepta credit prima casa?')->class('form-control input-sm')->enabled(0)
				->addon([
					'before' => \Form::checkbox('credit_prima_casa', '1', true, ['class' => 'data-source', 'id' => 'credit_prima_casa', 'data-control-source' => 'credit_prima_casa', 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]), 
					'after' => NULL
				]),
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