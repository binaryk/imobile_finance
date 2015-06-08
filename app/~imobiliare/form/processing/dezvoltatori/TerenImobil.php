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
                ->caption('Nume teren')
                ->placeholder('Nume teren')
                ->class('form-control input-sm data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )   
        ;

    }
}