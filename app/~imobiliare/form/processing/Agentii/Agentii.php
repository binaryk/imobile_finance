<?php
namespace Imobiliare\Imobile\Form;
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/12/2015
 * Time: 12:02 PM
 */
class Agentii  extends \Processing\Form\Form
{
    /**
     * @return Agentii, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
//      apelez constructorul din Form
        /*      $this->controls = new Collection();
                $this->addControls();
                $this->setView();
                $this->setModel();
                $this->setProperties(); */
        return self::$instance = new Agentii();
    }

    protected function setView()
    {
        $this->view('agentii.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Agentie');
    }

    protected function addControls()
    {
        $this->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume agentie')
                ->class('form-control  data-source')
                ->value('Nume')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )
            ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('telefon')
                    ->caption('Telefon agentie')
                    ->class('form-control  data-source')
                    ->controlsource('telefon')
                    ->controltype('textbox')
                    ->maxlength(255)
            );

    }
}