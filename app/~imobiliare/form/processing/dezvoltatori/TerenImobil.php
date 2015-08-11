<?php

namespace Imobiliare\Imobile\Form;

class TerenImobil extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new TerenImobil();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.teren.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Teren');
    }

    protected function addControls()
    {
        // denumire_tip
        $this
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Denumire')
                ->class('form-control  data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('adresa')
                ->caption('Adresă')
                ->class('form-control  data-source')
                ->controlsource('adresa')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon')
                ->caption('Telefon')
                ->class('form-control  data-source')
                ->controlsource('telefon')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('carte_funciara')
                ->caption('Carte funciara')
                ->class('form-control  data-source')
                ->controlsource('carte_funciara')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_destinatie_teren')
                ->caption('Detinație teren')
                ->class('form-control form-select data-source init-on-update-delete')
                ->controlsource('id_tip_destinatie_teren')
                ->controltype('combobox')
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipDestinatieTeren::toCombobox())
        )
        ->addControl(
            \Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
                ->name('detalii')
                ->caption('Detalii')
                ->controlsource('detalii')
                ->controltype('editbox')
                ->class('form-control input-sm data-source')
        )
        ;

    }
}