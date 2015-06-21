<?php

namespace Imobiliare\Imobile\Form;

class Proprietari extends \Processing\Form\Form
{

    /**
     * @return Proprietari, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
	{
//      apelez constructorul din Form
/*      $this->controls = new Collection();
        $this->addControls();
        $this->setView();
        $this->setModel();
        $this->setProperties(); */
		return self::$instance = new Proprietari();
	}

	protected function setView()
	{
		$this->view('proprietari.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Proprietar');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('nume')
			->caption('Nume proprietar') 
			->class('form-control  data-source')
			->value('Nume')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		)
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('telefon')
			->caption('Telefon proprietar') 
			->class('form-control  data-source')
			->controlsource('telefon')
			->controltype('textbox')
			->maxlength(255)
		); 

	}
}