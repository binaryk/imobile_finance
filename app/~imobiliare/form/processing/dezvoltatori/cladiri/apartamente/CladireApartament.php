<?php

namespace Imobiliare\Imobile\Form;

class CladireApartament extends ApartamentImobil
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    {
        return self::$instance = new CladireApartament();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.cladire.apartament.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Apartament');
    }

}