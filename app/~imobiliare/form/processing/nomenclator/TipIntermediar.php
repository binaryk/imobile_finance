<?php

namespace Imobiliare\Imobile\Form;

class TipIntermediar extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new TipIntermediar();
	}

	protected function setView()
	{
		$this->view('nomenclator.tip_intermediari.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|TipIntermediar');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumirea tipului de intermediar')
			->placeholder('Denumirea tipului de intermediar')
			->class('form-control input-sm data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}