<?php

namespace Imobiliare\Imobile\Form;

class DezvoltatoriAnsambluri extends \Processing\Form\Form {

	/**
	 * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
	 */
	public static function make() {
		return self::$instance = new DezvoltatoriAnsambluri();
	}

	protected function setView() {
		$this->view('dezvoltatori.ansambluri.form');
	}

	protected function setModel() {
		$this->model('Imobiliare|AnsambluRezidential');
	}

	protected function addControls() {
//      0
		$this->addControl(
			     \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			     	->name('nume')
			     	->caption('Nume ansamblu')
//			     	->placeholder('Nume ansamblu')
			     	->class('form-control  data-source')
			     	->controlsource('nume')
			     	->controltype('textbox')
			     	->maxlength(255)
		     )
//      1
		     ->addControl(
			     \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			     	->name('telefon')
			     	->caption('Telefon ansamblu')
//			     	->placeholder('Telefon ansamblu')
			     	->class('form-control  data-source')
			     	->controlsource('telefon')
			     	->controltype('textbox')
			     	->maxlength(255)
		     )
//       2
		     ->addControl(
			     \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			     	->name('anul_infiintarii')
			     	->caption('An infiintare')
//			     	->placeholder('An infiintare')
			     	->class('form-control  data-source')
			     	->controlsource('anul_infiintarii')
			     	->controltype('textbox')
			     	->maxlength(255)
		     )
//      3
			->addControl(
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
					->name('data_finalizare')->caption('Data finalizare')->placeholder('')
					->class('form-control data-source')->readonly(1)
					->controlsource('data_finalizare')->controltype('textbox')
					->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL])
			)
//      4
		     ->addControl(
			     \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
			     	->name('id_tip_stadiu_ansamblu')
			     	->caption('Stadiu ansamblu')
			     	->class('form-control  data-source init-on-update-delete')
			     	->controlsource('id_tip_stadiu_ansamblu')
			     	->controltype('combobox')
			     	->options(\Imobiliare\Nomenclator\TipStadiuAnsamblu::toCombobox())
		     )
//      5
		     ->addControl(
			     \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
			     	->name('strada')
			     	->caption('Strada ansamblu')
//			     	->placeholder('Strada ansamblu')
			     	->class('form-control  data-source')
			     	->controlsource('strada')
			     	->controltype('textbox')
			     	->maxlength(255)
		     )
//      6
		     ->addControl(
			     \Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
			     	->name('detalii_localizare_descriere')
			     	->caption('Detalii')
			     	->placeholder('Detalii localizare si descrierea ansamblului')
			     	->controlsource('detalii_localizare_descriere')
			     	->controltype('editbox')
			     	->class('form-control input-sm data-source')
		     )

		;

	}
}