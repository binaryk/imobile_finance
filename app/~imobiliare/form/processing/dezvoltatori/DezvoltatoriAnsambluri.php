<?php

namespace Imobiliare\Imobile\Form;

class DezvoltatoriAnsambluri extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new DezvoltatoriAnsambluri();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|AnsambluRezidential');
    }

    protected function addControls()
    {
        // denumire_tip
        $this->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume ansamblu')
                ->placeholder('Nume ansamblu')
                ->class('form-control  data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon')
                ->caption('Telefon ansamblu')
                ->placeholder('Telefon ansamblu')
                ->class('form-control  data-source')
                ->controlsource('telefon')
                ->controltype('textbox')
                ->maxlength(255)
            ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('anul_infiintarii')
                ->caption('An infiintare')
                ->placeholder('An infiintare')
                ->class('form-control  data-source')
                ->controlsource('anul_infiintarii')
                ->controltype('textbox')
                ->maxlength(255)
            )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('strada')
                ->caption('Strada ansamblu')
                ->placeholder('Strada ansamblu')
                ->class('form-control  data-source')
                ->controlsource('strada')
                ->controltype('textbox')
                ->maxlength(255)
            )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_stadiu_ansamblu')
                ->caption('Stadiu ansamblu') 
                ->class('form-control  data-source init-on-update-delete')
                ->controlsource('id_tip_stadiu_ansamblu')
                ->controltype('combobox')
                ->options(\Imobiliare\Nomenclator\TipStadiuAnsamblu::toCombobox()) 
            ) 

        ;

    }
}