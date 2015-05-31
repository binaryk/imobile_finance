<?php

namespace Imobiliare\Imobile\Form;

class Localitate extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new Localitate();
	}

	protected function setView()
	{
		$this->view('nomenclator.localitati.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|Localitate');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumire localitate')
			->placeholder('Denumire localitate')
			->class('form-control input-sm data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}