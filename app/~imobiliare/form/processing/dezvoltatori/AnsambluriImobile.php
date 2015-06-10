<?php

namespace Imobiliare\Imobile\Form;

class AnsambluriImobile extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new AnsambluriImobile();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Imobil');
    }

    protected function addControls()
    {
        // denumire_tip
        $this
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume imobil')
                ->placeholder('Nume imobil')
                ->class('form-control  data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata_min')
                ->caption('Suprafata minima')
                ->placeholder('Suprafata minima')
                ->class('form-control  data-source')
                ->controlsource('suprafata_min')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata_max')
                ->caption('Suprafata maxima')
                ->placeholder('Suprafata maxima')
                ->class('form-control  data-source')
                ->controlsource('suprafata_max')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        // teren, cladire, apartament 
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_categorie')
                ->caption('Judetul')
                ->class('form-control  data-source init-on-update-delete')
                ->controlsource('id_tip_categorie')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipCategorieImobil::toCombobox())
            )  
        ;

    }
}