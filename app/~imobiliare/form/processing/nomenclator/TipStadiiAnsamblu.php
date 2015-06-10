<?php

namespace Imobiliare\Imobile\Form;

class TipStadiiAnsamblu extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new TipStadiiAnsamblu();
	}

	protected function setView()
	{
		$this->view('nomenclator.tip_intermediari.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|TipStadiuAnsamblu');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumirea stadiului ansamblului')
			->placeholder('Denumirea stadiului ansamblului')
			->class('form-control  data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}