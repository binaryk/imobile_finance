<?php

namespace Imobiliare\Nomenclatoare\Form;

class CladireImobilRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare clădire')
            ->setCaption('update', 'Modificare clădire (#:id:)')
            ->setCaption('delete', 'Ştergere clădire (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea clădirei a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea clădirei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea clădirei a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea clădirei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea clădirei a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea clădirei <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nume', 'required') 
            ->addRule('update', 'nume', 'required') 

            ->addMessage('insert', 'nume.required', 'Denumirea clădirei trebuie completată.')
            ->addMessage('update', 'nume.required', 'Denumirea clădirei trebuie completată.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new CladireImobilRecord('cladire_imobil');
    }

}