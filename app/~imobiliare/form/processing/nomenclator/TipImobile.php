<?php

namespace Imobiliare\Imobile\Form;

class TipImobile extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new TipImobile();
	}

	protected function setView()
	{
		$this->view('nomenclator.tip_imobile.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|TipImobil');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumirea tipului de imobil')
			->placeholder('Denumirea tipului de imobil')
			->class('form-control  data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}