<?php

namespace Imobiliare\Imobile\Form;

class Imobil extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new Imobil();
	}

	protected function setView()
	{
		$this->view('imobiles.form');
	}

	protected function setModel()
	{
		$this->model('Imobil');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumirea imobilului')
			->placeholder('Denumirea imobilului')
			->class('form-control  data-source')
			->controlsource('denumire')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}