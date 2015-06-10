<?php

namespace Apartamente;

class CautareApartamenteController extends \Datatable\DatatableController
{

	protected $layout 		= 'template.layout';

	public function index()
	{
		$config = \Imobiliare\Grids::make('cauta-apartamente')->toIndexConfig('cauta-apartamente');

		$config['caption'] = '<span class="text-blue">' . '???' . '</span>. Lista de proiecte';
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
		return [
			'oferta-valabila' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Cu oferta valabilă?')->name('txt-oferta-valabila')->placeholder('')
				->value('Cu oferta valabila?')->class('form-control input-sm')->enabled(0)
				->addon([
					'before' => \Form::checkbox('oferta_valabila', '1', true, ['class' => 'data-source', 'id' => 'oferta_valabila', 'data-control-source' => 'oferta_valabila', 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]), 
					'after' => NULL
				]),
			'adresa-exacta' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('adresa_exacta')
				->caption('Adresa')
				->placeholder('Adresa')
				->class('form-control data-source input-sm')
				->controlsource('adresa_exacta')
				->controltype('textbox')
				->maxlength(255),
			'is-agentie' =>
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Este agentie?')->name('txt-is-agentie')->placeholder('')
				->value('Este agentie?')->class('form-control input-sm')->enabled(0)
				->addon([
					'before' => \Form::checkbox('is_agentie', '1', true, ['class' => 'data-source', 'id' => 'is_agentie', 'data-control-source' => 'is_agentie', 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]), 
					'after' => NULL
				]),
		];
	}
}