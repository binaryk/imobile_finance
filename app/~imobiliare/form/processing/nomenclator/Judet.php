<?php

namespace Imobiliare\Imobile\Form;

class Judet extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new Judet();
	}

	protected function setView()
	{
		$this->view('nomenclator.judet.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|Judet');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumire judet')
			->placeholder('Denumire judet')
			->class('form-control input-sm data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}