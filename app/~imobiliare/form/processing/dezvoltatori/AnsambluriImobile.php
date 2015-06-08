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
        $this->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume imobil')
                ->placeholder('Nume imobil')
                ->class('form-control input-sm data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        ) 

        ;

    }
}