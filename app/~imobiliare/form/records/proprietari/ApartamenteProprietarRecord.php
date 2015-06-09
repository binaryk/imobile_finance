<?php

namespace Imobiliare\Nomenclatoare\Form;

class ApartamenteProprietarRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare apartament')
            ->setCaption('update', 'Modificare apartament (#:id:)')
            ->setCaption('delete', 'Ştergere apartament (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea apartamentului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea apartamentului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea apartamentului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea apartamentului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea apartamentului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea apartamentului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'telefon', 'required') 
            ->addRule('update', 'telefon', 'required') 

            ->addRule('insert', 'id_cartier', 'required') 
            ->addRule('update', 'id_cartier', 'required') 

            ->addMessage('insert', 'telefon.required', 'Telefonul apartamentului trebuie completat.')
            ->addMessage('update', 'telefon.required', 'Telefonul apartamentului trebuie completat.')  

            ->addMessage('insert', 'id_cartier.required', 'Cartierul apartamentului trebuie completat.')
            ->addMessage('update', 'id_cartier.required', 'Cartierul apartamentului trebuie completat.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new ApartamenteProprietarRecord('apartamente_proprietar');
    }

}