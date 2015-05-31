<?php

namespace Imobiliare\Imobile\Form;

class TipCategorieImobil extends \Processing\Form\Form
{

    public static function make()
	{
		return self::$instance = new TipCategorieImobil();
	}

	protected function setView()
	{
		$this->view('nomenclator.tip_categorie_imobil.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclator|TipCategorieImobil');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('denumire')
			->caption('Denumirea categoriei de imobil')
			->placeholder('Denumirea categoriei de imobil')
			->class('form-control input-sm data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}