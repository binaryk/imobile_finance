<?php

namespace Imobiliare\Imobile\Form;

class Dezvoltatori extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
	{
//      apelez constructorul din Form
/*      $this->controls = new Collection();
        $this->addControls();
        $this->setView();
        $this->setModel();
        $this->setProperties(); */
		return self::$instance = new Dezvoltatori();
	}

	protected function setView()
	{
		$this->view('dezvoltatori.form');	
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Dezvoltator');
	}

	protected function addControls()
	{
		// denumire_tip
		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('nume')
			->caption('Nume dezvoltator')
			->placeholder('Nume dezvoltator')
			->class('form-control  data-source')
			->controlsource('nume')
			->controltype('textbox')
			->maxlength(255)
		);

		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('adresa')
			->caption('Adresa')
			->placeholder('Adresa dezvoltator')
			->class('form-control  data-source')
			->controlsource('adresa')
			->controltype('textbox')
			->maxlength(255)
		);

		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('telefon')
			->caption('Telefon')
			->placeholder('Telefon dezvoltator')
			->class('form-control  data-source')
			->controlsource('telefon')
			->controltype('textbox')
			->maxlength(255)
		);

        $this->addControl( // 11 Judet
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_judet')->caption('Judetul')
                ->class('form-control  data-source init-on-update-delete')
                ->controlsource('id_judet')->controltype('combobox')->options(\Imobiliare\Nomenclator\Judet::toCombobox())
        );

		$this->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			->name('email')
			->caption('E-mail')
			->placeholder('E-mail dezvoltator')
			->class('form-control  data-source')
			->controlsource('email')
			->controltype('textbox')
			->maxlength(255)
		);
	}
}