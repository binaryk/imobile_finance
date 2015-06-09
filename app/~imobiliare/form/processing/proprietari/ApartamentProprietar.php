<?php

namespace Imobiliare\Imobile\Form;

class ApartamentProprietar extends ApartamentImobil
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new ApartamentProprietar();
    }

    protected function setView()
    {
        $this->view('proprietari.apartamente.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Apartament');
    }
 
}