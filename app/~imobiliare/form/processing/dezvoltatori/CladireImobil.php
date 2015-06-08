<?php

namespace Imobiliare\Imobile\Form;

class CladireImobil extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new CladireImobil();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.cladire.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Cladire');
    }

    protected function addControls()
    {
        // denumire_tip
        $this
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume cladire')
                ->placeholder('Nume cladire')
                ->class('form-control input-sm data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )   
        ;

    }
}